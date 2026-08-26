<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Roblox Development',
                'slug' => 'roblox-development',
                'description' => 'Guides, frameworks, and insights on custom Roblox Luau game development.',
            ],
            [
                'name' => 'Web Engineering',
                'slug' => 'web-engineering',
                'description' => 'Modern fullstack web architecture, API integration, and performance.',
            ],
            [
                'name' => 'Studio News',
                'slug' => 'studio-news',
                'description' => 'Official announcements and updates from Nusa Garuda Studio.',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
