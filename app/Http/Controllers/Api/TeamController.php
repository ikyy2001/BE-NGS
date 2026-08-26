<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class TeamController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of team members ordered by sort_order.
     */
    public function index(): JsonResponse
    {
        $teams = Team::orderBy('sort_order', 'asc')->get();

        return $this->successResponse(TeamResource::collection($teams));
    }
}
