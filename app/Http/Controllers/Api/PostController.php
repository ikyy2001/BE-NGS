<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of published blog posts.
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = max(1, min((int) $request->input('per_page', $request->input('limit', 15)), 50));

        $query = Post::with('category')
            ->where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc');

        if ($categorySlug = $request->input('category')) {
            if ($categorySlug !== 'all') {
                $query->whereHas('category', function ($q) use ($categorySlug) {
                    $q->where('slug', $categorySlug)
                      ->orWhere('name', $categorySlug);
                });
            }
        }

        if ($search = $request->input('search', $request->input('q'))) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('body', 'like', "%{$search}%")
                  ->orWhere('primary_keyword', 'like', "%{$search}%")
                  ->orWhere('secondary_keywords', 'like', "%{$search}%");
            });
        }

        if ($keyword = $request->input('keyword')) {
            $query->where(function ($q) use ($keyword) {
                $q->where('primary_keyword', 'like', "%{$keyword}%")
                  ->orWhere('secondary_keywords', 'like', "%{$keyword}%");
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
     * Display the specified blog post by slug or ID.
     */
    public function show(string $slug): JsonResponse
    {
        $cleanedSlug = trim($slug);

        $post = Post::with('category')
            ->where(function ($q) use ($cleanedSlug) {
                $q->where('slug', $cleanedSlug)
                  ->orWhere('slug', urldecode($cleanedSlug))
                  ->orWhere('slug', strtolower($cleanedSlug));
                
                if (is_numeric($cleanedSlug)) {
                    $q->orWhere('id', (int) $cleanedSlug);
                }
            })
            ->where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->first();

        if (! $post) {
            return $this->errorResponse('Post not found', null, 404);
        }

        return $this->successResponse(
            new PostResource($post),
            'Post detail retrieved successfully'
        );
    }
}

