<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GalleryResource;
use App\Models\Gallery;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of gallery items.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Gallery::query();

        if ($request->has('category') && filled($request->query('category'))) {
            $query->where('category', $request->query('category'));
        }

        $items = $query->latest()->get();

        return $this->successResponse(GalleryResource::collection($items));
    }
}
