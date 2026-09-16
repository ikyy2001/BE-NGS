<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'content' => $this->body, // normalized alias for frontend
            'primary_keyword' => $this->primary_keyword,
            'secondary_keywords' => $this->secondary_keywords,
            'secondary_keywords_list' => $this->secondary_keywords_list,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'canonical_url' => $this->canonical_url,
            'schema_type' => $this->schema_type ?? 'BlogPosting',
            'image' => $this->image,
            'image_url' => $this->image_url,
            'og_image' => $this->og_image,
            'og_image_url' => $this->og_image_url,
            'is_published' => (bool) $this->is_published,
            'published_at' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'category' => $this->whenLoaded('category', function () {
                return [
                    'id' => $this->category->id,
                    'name' => $this->category->name,
                    'slug' => $this->category->slug,
                    'description' => $this->category->description ?? null,
                ];
            }),
        ];
    }
}
