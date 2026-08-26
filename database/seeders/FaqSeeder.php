<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'category' => 'general',
                'title' => 'What core services does Nusa Garuda Studio offer?',
                'description' => 'We specialize in fullstack website & web application development, custom Roblox game development & Luau scripting, CBT/LMS online exam platforms, high-throughput video hosting architectures, and cloud infrastructure setup.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'category' => 'general',
                'title' => 'How long does a typical project take from design to launch?',
                'description' => 'Timeline depends on project scope. Web landing pages typically take 1–2 weeks, custom Roblox experiences take 3–6 weeks, and full-scale enterprise LMS/video platforms take 6–12 weeks.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'category' => 'commercial',
                'title' => 'What is your payment milestone structure?',
                'description' => 'Our standard milestone breakdown is 30% upfront deposit upon contract signing, 40% after prototype/alpha milestone approval, and 30% upon final deployment and handoff.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'category' => 'commercial',
                'title' => 'Do you offer white-label or enterprise software licensing?',
                'description' => 'Yes, our LMS/CBT platforms and video hosting solutions can be licensed under white-label models with complete IP transfer or self-hosted deployment options.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'category' => 'technology',
                'title' => 'What tech stack do you use for web and backend engineering?',
                'description' => 'Our core backend stack centers around Laravel, PHP 8+, Go, Node.js, and PostgreSQL/MySQL, paired with modern frontends like React, Astro, Next.js, and Tailwind CSS.',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'category' => 'technology',
                'title' => 'How do you handle custom Roblox scripting and asset optimization?',
                'description' => 'We use professional developer workflows including Rojo, Knit framework, Git version control, custom Luau OOP patterns, and optimized low-poly Blender modeling for high performance.',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'category' => 'maintenance',
                'title' => 'Do you provide post-launch support and SLAs?',
                'description' => 'Every project includes 30 days of complimentary post-launch bug fixes and performance monitoring. We also offer dedicated monthly SLA maintenance plans.',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'category' => 'maintenance',
                'title' => 'How are database backups and server upgrades handled?',
                'description' => 'We configure automated daily/weekly encrypted off-site database backups, server health alerts, automated security patch deployments, and zero-downtime updates.',
                'sort_order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
