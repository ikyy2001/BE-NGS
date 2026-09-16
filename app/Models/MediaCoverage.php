<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaCoverage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'outlet_name',
        'outlet_logo',
        'cover_image',
        'excerpt',
        'body',
        'source_url',
        'is_published',
        'sort_order',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'sort_order' => 'integer',
    ];

    protected $appends = [
        'cover_image_url',
        'outlet_logo_url',
    ];

    protected static function booted(): void
    {
        static::saving(function (MediaCoverage $coverage) {
            if (empty($coverage->slug) && ! empty($coverage->title)) {
                $coverage->slug = Str::slug($coverage->title);
            }
        });
    }

    public function getCoverImageUrlAttribute(): ?string
    {
        return $this->formatPublicUrl($this->cover_image);
    }

    public function getOutletLogoUrlAttribute(): ?string
    {
        return $this->formatPublicUrl($this->outlet_logo);
    }

    protected function formatPublicUrl(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return Storage::disk('public')->url($path);
    }
}
