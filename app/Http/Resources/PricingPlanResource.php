<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PricingPlanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'price' => $this->price,
            'billing_period' => $this->billing_period,
            'badge' => $this->badge,
            'features' => $this->features ?? [],
            'button_text' => $this->button_text ?? 'Choose Plan',
            'button_url' => $this->button_url ?? '/quote',
            'is_featured' => $this->is_featured,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];
    }
}
