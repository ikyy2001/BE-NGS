<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Garuda World RP - Immersive Roblox Experience',
                'slug' => 'garuda-world-rp',
                'description' => 'A custom roleplay open-world Roblox game with tailored vehicle mechanics, inventory systems, and economy.',
                'detail_description' => 'Garuda World RP is a high-performance Roblox game built for massive multiplayer immersion. Nusa Garuda Studio created complex Luau scripts, customized UI components, database persistence using MemoryStores and DataStores, and 3D environment assets optimized for low latency across mobile and desktop devices.',
                'category' => 'Roblox Development',
                'client' => 'PT Garuda Entertainment',
                'technology' => 'Roblox Studio, Luau, Rojo, Blender',
                'image_url' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
            ],
            [
                'title' => 'Nusa LMS & CBT Enterprise Platform',
                'slug' => 'nusa-lms-cbt-platform',
                'description' => 'Scalable Learning Management System & Computer Based Testing platform designed for thousands of concurrent users.',
                'detail_description' => 'A robust e-learning and online exam platform featuring auto-grading, real-time exam monitoring, anti-cheat screen locks, detailed student performance analytics, and dynamic exam question generators.',
                'category' => 'Website Development',
                'client' => 'Yayasan Pendidikan Nusantara',
                'technology' => 'React, Laravel, PostgreSQL, Docker',
                'image_url' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
            ],
            [
                'title' => 'StreamGaruda - High Throughput Video Hosting',
                'slug' => 'streamgaruda-video-hosting',
                'description' => 'Adaptive bit-rate streaming portal with custom video player and secure content delivery network.',
                'detail_description' => 'An end-to-end video hosting and streaming solution featuring HLS adaptive streaming, cloud video transcoding, watermarking, DRM encryption, and instant playback analytics.',
                'category' => 'Cloud & Media Solutions',
                'client' => 'Garuda Media Vision',
                'technology' => 'Next.js, Go, AWS HLS, Cloudflare Stream',
                'image_url' => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
            ],
            [
                'title' => 'Cyber Combat Arena - Roblox Multiplayer',
                'slug' => 'cyber-combat-arena',
                'description' => 'Action-packed PvP arena game on Roblox featuring custom combat physics and monetization loops.',
                'detail_description' => 'Cyber Combat Arena delivers fast-paced futuristic PvP combat on Roblox. Features weapon skin trading systems, seasonal battle passes, leaderboards, and optimized mesh LODs for mobile devices.',
                'category' => 'Roblox Development',
                'client' => 'Nexus Gaming Guild',
                'technology' => 'Roblox Studio, Luau, Knit Framework',
                'image_url' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=800&q=80',
                'is_featured' => false,
            ],
            [
                'title' => 'EduNusa Interactive Learning Portal',
                'slug' => 'edunusa-learning-portal',
                'description' => 'Interactive educational website with live online classrooms, course progress tracking, and gamified badges.',
                'detail_description' => 'Modern Web app developed for digital courses, equipped with responsive Astro front-end, interactive quiz modules, progress tracking dashboard, and seamless payment gateway integration.',
                'category' => 'Website Development',
                'client' => 'EduNusa Tech Academy',
                'technology' => 'Astro, React, Tailwind CSS, Laravel API',
                'image_url' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=800&q=80',
                'is_featured' => false,
            ],
            [
                'title' => 'Garuda Analytics & Admin Dashboard',
                'slug' => 'garuda-analytics-admin-dashboard',
                'description' => 'Real-time studio operations dashboard tracking user metrics, revenue streams, and system health.',
                'detail_description' => 'Enterprise admin dashboard providing live metric visualization, automated PDF reporting, user access management, and REST API monitoring for studio management.',
                'category' => 'Web Application',
                'client' => 'Internal Studio System',
                'technology' => 'Vue.js, Laravel, Redis, Chart.js',
                'image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80',
                'is_featured' => false,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
