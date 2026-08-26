<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FaqResource;
use App\Models\Faq;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of active FAQs ordered by sort_order.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Faq::where('is_active', true)->orderBy('sort_order', 'asc');

        if ($request->has('category') && filled($request->query('category'))) {
            $query->where('category', $request->query('category'));
        }

        $faqs = $query->get();

        return $this->successResponse(FaqResource::collection($faqs));
    }
}
