<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuoteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'company' => $this->company,
            'organization_size' => $this->organization_size,
            'goals_challenges' => $this->goals_challenges,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
