<?php

namespace Database\Seeders;

use App\Models\PopupBanner;
use Illuminate\Database\Seeder;

class PopupBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $popups = [
            [
                'title' => 'Promo Spesial Pembuatan Game & Web Platform',
                'image_path' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=1200&auto=format&fit=crop',
                'link_url' => '/quote',
                'target' => '_self',
                'sort_order' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($popups as $popup) {
            PopupBanner::updateOrCreate(
                ['title' => $popup['title']],
                $popup
            );
        }
    }
}
