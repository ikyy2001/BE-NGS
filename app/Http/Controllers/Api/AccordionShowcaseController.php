<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccordionShowcaseResource;
use App\Models\AccordionShowcase;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccordionShowcaseController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of active accordion showcase items.
     */
    public function index(Request $request): JsonResponse
    {
        $items = AccordionShowcase::query()
            ->where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return $this->successResponse(AccordionShowcaseResource::collection($items));
    }
}
