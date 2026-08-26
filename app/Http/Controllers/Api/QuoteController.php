<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Resources\QuoteResource;
use App\Models\Quote;
use App\Notifications\QuoteReceivedNotification;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class QuoteController extends Controller
{
    use ApiResponse;

    /**
     * Store a newly created quotation request in storage.
     */
    public function store(StoreQuoteRequest $request): JsonResponse
    {
        $data = $request->validated();

        Log::info('New quote request submitted', [
            'name' => $data['name'],
            'email' => $data['email'],
            'company' => $data['company'],
        ]);

        $quote = Quote::create($data);

        $adminEmail = config('mail.from.address', env('ADMIN_EMAIL', 'admin@nusagaruda.com'));
        try {
            Notification::route('mail', $adminEmail)
                ->notify(new QuoteReceivedNotification($quote));
        } catch (\Throwable $e) {
            Log::error('Failed sending quote notification mail', [
                'error' => $e->getMessage(),
                'quote_id' => $quote->id,
            ]);
        }

        return $this->successResponse(
            new QuoteResource($quote),
            'Quote request submitted successfully',
            201
        );
    }
}
