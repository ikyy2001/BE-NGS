<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class TestimonialController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of published testimonials.
     */
    public function index(): JsonResponse
    {
        $testimonials = Testimonial::where('is_published', true)->latest()->get();

        return $this->successResponse(TestimonialResource::collection($testimonials));
    }
}
