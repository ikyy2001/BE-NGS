<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MediaCoverageResource;
use App\Models\MediaCoverage;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MediaCoverageController extends Controller
{
    use ApiResponse;

    /**
     * Display published media coverage articles.
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = min((int) $request->input('per_page', $request->input('limit', 12)), 50);

        $query = MediaCoverage::query()
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->orderByDesc('published_at')
            ->orderByDesc('created_at');

        if ($search = $request->input('search', $request->input('q'))) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('outlet_name', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('body', 'like', "%{$search}%");
            });
        }

        if ($outlet = $request->input('outlet')) {
            $query->where('outlet_name', 'like', "%{$outlet}%");
        }

        $coverages = $query->paginate($perPage);

        return response()->json([
            'success' => true,
            'message' => 'Media coverage retrieved successfully',
            'data' => $coverages,
        ]);
    }

    /**
     * Display a published media coverage article by slug.
     */
    public function show(string $slug): JsonResponse
    {
        $cleanedSlug = trim($slug);

        $coverage = MediaCoverage::query()
            ->where(function ($q) use ($cleanedSlug) {
                $q->where('slug', $cleanedSlug)
                  ->orWhere('slug', urldecode($cleanedSlug))
                  ->orWhere('slug', strtolower($cleanedSlug));

                if (is_numeric($cleanedSlug)) {
                    $q->orWhere('id', (int) $cleanedSlug);
                }
            })
            ->where('is_published', true)
            ->first();

        if (! $coverage) {
            return $this->errorResponse('Media coverage not found', null, 404);
        }

        return $this->successResponse(
            new MediaCoverageResource($coverage),
            'Media coverage detail retrieved successfully'
        );
    }
}
