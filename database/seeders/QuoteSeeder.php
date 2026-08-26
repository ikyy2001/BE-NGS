<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quotes = [
            [
                'name' => 'Bambang Trihatmojo',
                'email' => 'bambang@garudamedia.co.id',
                'company' => 'PT Garuda Media Utama',
                'organization_size' => 'large',
                'goals_challenges' => 'We need an enterprise video-on-demand & live streaming portal capable of serving 100k+ daily active users with adaptive HLS transcoding and DRM protection.',
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi@smartschool.sch.id',
                'company' => 'Smart School Foundation',
                'organization_size' => 'medium',
                'goals_challenges' => 'Our main goal is to migrate from manual paper exams to a centralized CBT platform with real-time grading, fraud prevention, and analytics for 2,500 students.',
            ],
            [
                'name' => 'Rian Hidayat',
                'email' => 'rian@metagameplay.com',
                'company' => 'Meta Gameplay Interactive',
                'organization_size' => 'small',
                'goals_challenges' => 'Looking to build a featured Roblox experience with custom RPG mechanics, item trading system, and monetization strategy targeting Southeast Asian gamers.',
            ],
            [
                'name' => 'Nadia Putri',
                'email' => 'nadia@digitalpulse.id',
                'company' => 'Digital Pulse Agency',
                'organization_size' => 'medium',
                'goals_challenges' => 'We require a modern high-converting company portfolio website integrated with a CMS admin dashboard, blog, and quotation management module.',
            ],
            [
                'name' => 'Taufik Hidayat',
                'email' => 'taufik@indotechcorp.com',
                'company' => 'IndoTech Corp',
                'organization_size' => 'large',
                'goals_challenges' => 'Need fullstack software architecture consulting, API microservices overhaul, and cloud devops infrastructure setup with 99.9% uptime SLA.',
            ],
        ];

        foreach ($quotes as $quote) {
            Quote::create($quote);
        }
    }
}
