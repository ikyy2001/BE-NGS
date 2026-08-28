<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanySettingResource;
use App\Models\CompanySetting;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanySettingController extends Controller
{
    use ApiResponse;

    /**
     * Display the studio company & social settings.
     */
    public function index(Request $request): JsonResponse
    {
        $setting = CompanySetting::first() ?? CompanySetting::create([
            'studio_name' => 'Nusa Garuda Studio',
            'tagline' => 'Creative Technology & Game Development Studio',
            'phone' => '+62 821-6275-7576',
            'whatsapp_number' => '6282162757576',
            'email' => 'info@nusagarudastudio.my.id',
            'address' => 'Depok - Bogor, Indonesia',
            'copyright_text' => 'Design By Nusa Garuda Studio',
        ]);

        return $this->successResponse(new CompanySettingResource($setting));
    }
}
