<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanySettingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'studio_name' => $this->studio_name,
            'tagline' => $this->tagline,
            'phone' => $this->phone,
            'whatsapp_number' => $this->whatsapp_number,
            'email' => $this->email,
            'address' => $this->address,
            'google_maps_url' => $this->google_maps_url,
            'discord_url' => $this->discord_url,
            'roblox_group_url' => $this->roblox_group_url,
            'instagram_url' => $this->instagram_url,
            'tiktok_url' => $this->tiktok_url,
            'youtube_url' => $this->youtube_url,
            'github_url' => $this->github_url,
            'linkedin_url' => $this->linkedin_url,
            'copyright_text' => $this->copyright_text,
            'updated_at' => $this->updated_at,
        ];
    }
}
