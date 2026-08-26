<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;

class BrandController extends Controller
{
    /**
     * Display a listing of active brands/partners.
     */
    public function index(): JsonResponse
    {
        $brands = Brand::query()
            ->where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Brands retrieved successfully',
            'data' => $brands,
        ]);
    }
}
