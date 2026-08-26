<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $robloxCat = Category::where('slug', 'roblox-development')->first();
        $webCat = Category::where('slug', 'web-engineering')->first();
        $newsCat = Category::where('slug', 'studio-news')->first();

        $posts = [
            [
                'category_id' => $robloxCat?->id,
                'title' => 'Building Scalable Roleplay Ecosystems on Roblox in 2026',
                'slug' => 'building-scalable-roleplay-ecosystems-roblox-2026',
                'body' => 'Developing high-concurrency Roblox roleplay games requires robust memory management, efficient custom datastores, and modular server-side script dispatchers. In this article, our senior Roblox engineering team shares architectural lessons learned from scaling Garuda World RP to thousands of concurrent active players.',
                'image' => '/images/blog-thumbnail-1.webp',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'category_id' => $webCat?->id,
                'title' => 'Decoupled Web Architecture: Connecting Astro Frontend with Laravel Backend',
                'slug' => 'decoupled-web-architecture-astro-laravel',
                'body' => 'Combining Astro JS for ultra-fast static and dynamic SSR frontend rendering with Laravel REST APIs provides the ultimate Developer Experience (DX) and end-user performance. Learn how Nusa Garuda Studio structures high-throughput web applications with seamless client-side hydration.',
                'image' => '/images/blog-thumbnail-2.webp',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'category_id' => $newsCat?->id,
                'title' => 'Nusa Garuda Studio Expands Commercial Development Capabilities',
                'slug' => 'nusa-garuda-studio-expands-commercial-capabilities',
                'body' => 'We are excited to announce our expanded service offerings for enterprise game scripting, custom web platform development, and client ecosystem management. Read more about our vision for empowering creators and brands across Indonesia.',
                'image' => '/images/blog-thumbnail-3.webp',
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}
