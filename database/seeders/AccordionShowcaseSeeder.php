<?php

namespace Database\Seeders;

use App\Models\AccordionShowcase;
use Illuminate\Database\Seeder;

class AccordionShowcaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Roblox & Game Dev',
                'image_url' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=900&auto=format&fit=crop',
                'link' => '/service',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Modern Web Platforms',
                'image_url' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=900&auto=format&fit=crop',
                'link' => '/service',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'UI/UX Design Systems',
                'image_url' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?q=80&w=900&auto=format&fit=crop',
                'link' => '/service',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Custom Digital Solutions',
                'image_url' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=900&auto=format&fit=crop',
                'link' => '/service',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Digital Ecosystem & Cloud',
                'image_url' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=900&auto=format&fit=crop',
                'link' => '/service',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($items as $item) {
            AccordionShowcase::updateOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}
