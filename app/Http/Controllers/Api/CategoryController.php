<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories with published post count.
     */
    public function index(): JsonResponse
    {
        $categories = Category::withCount(['posts' => function ($q) {
            $q->where('is_published', true);
        }])
        ->orderBy('name', 'asc')
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Categories retrieved successfully',
            'data' => $categories,
        ]);
    }
}
