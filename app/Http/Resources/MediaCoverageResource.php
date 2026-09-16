<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaCoverageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'outlet_name' => $this->outlet_name,
            'outlet_logo' => $this->outlet_logo,
            'outlet_logo_url' => $this->outlet_logo_url,
            'cover_image' => $this->cover_image,
            'cover_image_url' => $this->cover_image_url,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            'source_url' => $this->source_url,
            'is_published' => $this->is_published,
            'sort_order' => $this->sort_order,
            'published_at' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
