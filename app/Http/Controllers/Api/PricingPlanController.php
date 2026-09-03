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
        $query = PricingPlan::query()->where('is_active', true);

        if ($request->has('category') && filled($request->query('category'))) {
            $query->where('category', $request->query('category'));
        }

        $plans = $query
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return $this->successResponse(PricingPlanResource::collection($plans));
    }
}
