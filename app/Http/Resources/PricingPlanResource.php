<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PricingPlanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $features = $this->features;
        if (is_string($features)) {
            $decoded = json_decode($features, true);
            $features = is_array($decoded) ? $decoded : explode(',', $features);
        }
        if (!is_array($features)) {
            $features = [];
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => $this->category ?? 'general',
            'subtitle' => $this->subtitle,
            'price' => $this->price,
            'billing_period' => $this->billing_period,
            'badge' => $this->badge,
            'features' => array_values(array_filter(array_map(function ($f) {
                return is_string($f) ? trim($f) : (string)$f;
            }, $features))),
            'button_text' => $this->button_text ?? 'Choose Plan',
            'button_url' => $this->button_url ?? '/quote',
            'is_featured' => (bool) $this->is_featured,
            'is_active' => (bool) $this->is_active,
            'sort_order' => (int) $this->sort_order,
        ];
    }
}
