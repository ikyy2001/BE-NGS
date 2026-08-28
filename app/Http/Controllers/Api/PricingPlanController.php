<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PricingPlanResource;
use App\Models\PricingPlan;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of active pricing plans.
     */
    public function index(Request $request): JsonResponse
    {
        $plans = PricingPlan::query()
            ->where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return $this->successResponse(PricingPlanResource::collection($plans));
    }
}
