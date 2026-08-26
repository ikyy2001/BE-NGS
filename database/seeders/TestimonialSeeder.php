<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Budi Santoso',
                'company' => 'PT Garuda Entertainment',
                'avatar_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80',
                'testimony' => 'Nusa Garuda Studio delivered our Roblox game far beyond expectations. Their expertise in Luau scripting, custom UI, and server optimization made our launch seamless and hit 10k concurrent players on day one!',
                'is_published' => true,
            ],
            [
                'name' => 'Siti Rahmawati',
                'company' => 'Yayasan Pendidikan Nusantara',
                'avatar_url' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=200&q=80',
                'testimony' => 'The CBT and LMS platform engineered by Nusa Garuda Studio accommodated over 50,000 students simultaneously without a single drop in latency. Highly professional engineering team.',
                'is_published' => true,
            ],
            [
                'name' => 'Andi Wijaya',
                'company' => 'Garuda Media Vision',
                'avatar_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&q=80',
                'testimony' => 'Building our custom video hosting architecture was complex, but Nusa Garuda Studio nailed adaptive streaming and security flawlessly. Their cloud infrastructure knowledge is top tier.',
                'is_published' => true,
            ],
            [
                'name' => 'Jessica Tan',
                'company' => 'Nexus Gaming Guild',
                'avatar_url' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=200&q=80',
                'testimony' => 'Fast execution, sleek UI design, and responsive communication throughout the game development sprint. We will definitely work with Nusa Garuda Studio for our next project.',
                'is_published' => true,
            ],
            [
                'name' => 'Reza Pratama',
                'company' => 'EduNusa Tech Academy',
                'avatar_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=200&q=80',
                'testimony' => 'Our web portal conversion from static to a dynamic platform went smoothly. The studio understood our design requirements and delivered clean, scalable Laravel code.',
                'is_published' => true,
            ],
            [
                'name' => 'Michael Chen',
                'company' => 'Global Interactive Labs',
                'avatar_url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=200&q=80',
                'testimony' => 'Exceptional technical standard and transparent project management. Nusa Garuda Studio feels like a natural extension of our in-house engineering team.',
                'is_published' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
