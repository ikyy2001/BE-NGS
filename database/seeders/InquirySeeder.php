<?php

namespace Database\Seeders;

use App\Models\Inquiry;
use Illuminate\Database\Seeder;

class InquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inquiries = [
            [
                'name' => 'Ahmad Fauzi',
                'email' => 'ahmad.fauzi@example.com',
                'phone' => '081234567890',
                'subject' => 'Inquiry for Roblox Game Development Project',
                'message' => 'Hello Nusa Garuda Studio! We are looking to develop a custom multiplayer simulation game on Roblox. We would like to discuss Luau scripting, 3D asset creation, and estimated timelines.',
            ],
            [
                'name' => 'Clarissa Utami',
                'email' => 'clarissa@edu-institute.id',
                'phone' => '082198765432',
                'subject' => 'Need Online CBT Exam Platform Setup',
                'message' => 'We are an educational institution looking for an anti-cheat CBT platform that can handle 5,000 simultaneous students. Could you send us details about your Nusa LMS & CBT software?',
            ],
            [
                'name' => 'Hendra Gunawan',
                'email' => 'hendra@mediahouse.com',
                'phone' => '08111222333',
                'subject' => 'Video Hosting Infrastructure Consultation',
                'message' => 'Hi team! We need a secure HLS video streaming backend with watermarking and cloud storage integration. Are you available for a project scoping call this week?',
            ],
            [
                'name' => 'Maya Kartika',
                'email' => 'maya@creativestudio.org',
                'phone' => '085678901234',
                'subject' => 'Astro & React Dynamic Web Redesign',
                'message' => 'Our current static website needs to be converted into a dynamic platform connected to a Laravel API backend. Please let us know your availability.',
            ],
            [
                'name' => 'Kevin Pratama',
                'email' => 'kevin@esportsasia.net',
                'phone' => '087654321098',
                'subject' => 'Partnership Inquiry for Game Assets & Mechanics',
                'message' => 'We are hosting an eSports tournament on Roblox and would like to commission custom UI, map models, and leaderboard scripts.',
            ],
        ];

        foreach ($inquiries as $inquiry) {
            Inquiry::create($inquiry);
        }
    }
}
