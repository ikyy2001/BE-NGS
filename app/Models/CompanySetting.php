<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    use HasFactory;

    protected $table = 'company_settings';

    protected $fillable = [
        'studio_name',
        'tagline',
        'phone',
        'whatsapp_number',
        'email',
        'address',
        'latitude',
        'longitude',
        'google_maps_url',
        'google_maps_embed_url',
        'discord_url',
        'roblox_group_url',
        'instagram_url',
        'tiktok_url',
        'youtube_url',
        'github_url',
        'linkedin_url',
        'copyright_text',
    ];
}
