<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInquiryRequest;
use App\Http\Resources\InquiryResource;
use App\Models\Inquiry;
use App\Notifications\InquiryReceivedNotification;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class InquiryController extends Controller
{
    use ApiResponse;

    /**
     * Store a newly created contact inquiry in storage.
     */
    public function store(StoreInquiryRequest $request): JsonResponse
    {
        $data = $request->validated();

        Log::info('New contact inquiry submitted', [
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
        ]);

        $inquiry = Inquiry::create($data);

        $adminEmail = config('mail.from.address', env('ADMIN_EMAIL', 'admin@nusagaruda.com'));
        try {
            Notification::route('mail', $adminEmail)
                ->notify(new InquiryReceivedNotification($inquiry));
        } catch (\Throwable $e) {
            Log::error('Failed sending inquiry notification mail', [
                'error' => $e->getMessage(),
                'inquiry_id' => $inquiry->id,
            ]);
        }

        return $this->successResponse(
            new InquiryResource($inquiry),
            'Inquiry submitted successfully',
            201
        );
    }
}
