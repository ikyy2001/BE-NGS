<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of published blog posts.
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = min((int) $request->input('per_page', $request->input('limit', 15)), 50);

        $query = Post::with('category')
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc');

        if ($categorySlug = $request->input('category')) {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $posts = $query->paginate($perPage);

        return response()->json([
            'success' => true,
            'message' => 'Posts retrieved successfully',
            'data' => $posts,
        ]);
    }

    /**
     * Display the specified blog post by slug.
     */
    public function show(string $slug): JsonResponse
    {
        $post = Post::with('category')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->first();

        if (! $post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Post detail retrieved successfully',
            'data' => $post,
        ]);
    }
}
