<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanySetting::updateOrCreate(
            ['id' => 1],
            [
                'studio_name' => 'Nusa Garuda Studio',
                'tagline' => 'Creative Technology Studio for Games, Web Platforms, and Custom Digital Solutions',
                'phone' => '+62 821-6275-7576',
                'whatsapp_number' => '6282162757576',
                'email' => 'info@nusagarudastudio.my.id',
                'address' => 'Depok - Bogor, Indonesia',
                'latitude' => '-6.402484',
                'longitude' => '106.794243',
                'google_maps_url' => 'https://maps.google.com/?q=-6.402484,106.794243',
                'google_maps_embed_url' => null,
                'discord_url' => 'https://discord.gg/nusagaruda',
                'roblox_group_url' => 'https://www.roblox.com/groups/nusagaruda',
                'instagram_url' => 'https://instagram.com/nusagarudastudio',
                'tiktok_url' => 'https://tiktok.com/@nusagarudastudio',
                'youtube_url' => 'https://youtube.com/@nusagarudastudio',
                'github_url' => 'https://github.com/nusagarudastudio',
                'linkedin_url' => 'https://linkedin.com/company/nusagarudastudio',
                'copyright_text' => 'Design By Nusa Garuda Studio',
            ]
        );
    }
}
