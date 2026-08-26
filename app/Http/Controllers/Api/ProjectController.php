<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectDetailResource;
use App\Http\Resources\ProjectListResource;
use App\Models\Project;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of projects.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Project::query();

        if ($request->has('category') && filled($request->query('category'))) {
            $query->where('category', $request->query('category'));
        }

        if ($request->has('featured') && filled($request->query('featured'))) {
            $isFeatured = filter_var($request->query('featured'), FILTER_VALIDATE_BOOLEAN);
            $query->where('is_featured', $isFeatured);
        }

        if ($request->has('limit') && is_numeric($request->query('limit'))) {
            $limit = min((int) $request->query('limit'), 50);
            if ($limit > 0) {
                $query->limit($limit);
            }
        }

        $projects = $query->latest()->get();

        return $this->successResponse(ProjectListResource::collection($projects));
    }

    /**
     * Display the specified project by slug.
     */
    public function show(string $slug): JsonResponse
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return $this->successResponse(new ProjectDetailResource($project));
    }
}
