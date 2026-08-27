<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * Return a success JSON response wrapper.
     */
    protected function successResponse(mixed $data, string $message = 'Data retrieved successfully', int $code = 200): JsonResponse
    {
        if ($data instanceof \Illuminate\Http\Resources\Json\JsonResource) {
            $data = $data->resolve();
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    /**
     * Return an error JSON response wrapper.
     */
    protected function errorResponse(string $message = 'An error occurred', mixed $errors = null, int $code = 400): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if ($errors !== null) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code);
    }
}
