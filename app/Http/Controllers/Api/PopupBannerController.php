<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PopupBannerResource;
use App\Models\PopupBanner;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PopupBannerController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of active popup banners.
     */
    public function index(Request $request): JsonResponse
    {
        $popups = PopupBanner::query()
            ->where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return $this->successResponse(PopupBannerResource::collection($popups));
    }
}
