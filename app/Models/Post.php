<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'primary_keyword',
        'secondary_keywords',
        'meta_title',
        'meta_description',
        'canonical_url',
        'schema_type',
        'body',
        'image',
        'og_image',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            if (empty($post->slug) && ! empty($post->title)) {
                $post->slug = \Illuminate\Support\Str::slug($post->title);
            }
        });
    }

    protected $appends = [
        'image_url',
        'og_image_url',
        'secondary_keywords_list',
    ];

    public function getSecondaryKeywordsListAttribute(): array
    {
        if (empty($this->secondary_keywords)) {
            return [];
        }

        if (is_array($this->secondary_keywords)) {
            return $this->secondary_keywords;
        }

        return array_values(array_filter(array_map('trim', explode(',', (string) $this->secondary_keywords))));
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }

        return Storage::disk('public')->url($this->image);
    }

    public function getOgImageUrlAttribute(): ?string
    {
        if (! $this->og_image) {
            return $this->image_url;
        }

        if (str_starts_with($this->og_image, 'http://') || str_starts_with($this->og_image, 'https://')) {
            return $this->og_image;
        }

        return Storage::disk('public')->url($this->og_image);
    }
}
