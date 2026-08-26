<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Roblox Game Custom HUD & Inventory System UI',
                'image_url' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=800&q=80',
                'category' => 'product',
            ],
            [
                'title' => 'Nusa Garuda Studio Engineering HQ',
                'image_url' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80',
                'category' => 'photo',
            ],
            [
                'title' => 'Nusa CBT Computer-Based Testing Interface',
                'image_url' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=800&q=80',
                'category' => 'product',
            ],
            [
                'title' => 'Team Architecture & Code Review Sprint',
                'image_url' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80',
                'category' => 'photo',
            ],
            [
                'title' => 'StreamGaruda HLS Player & Transcoder Dashboard',
                'image_url' => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=800&q=80',
                'category' => 'product',
            ],
            [
                'title' => 'Tech Meetup & Studio Showcase Workshop',
                'image_url' => 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?auto=format&fit=crop&w=800&q=80',
                'category' => 'photo',
            ],
        ];

        foreach ($items as $item) {
            Gallery::create($item);
        }
    }
}
