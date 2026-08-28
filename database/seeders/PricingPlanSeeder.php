<?php

namespace Database\Seeders;

use App\Models\PricingPlan;
use Illuminate\Database\Seeder;

class PricingPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'title' => 'Website & Platform Development',
                'subtitle' => 'Solusi website & platform modern dengan performa tinggi.',
                'price' => 'Starting at IDR 300K',
                'billing_period' => 'Starting at',
                'badge' => null,
                'features' => [
                    'Strategic Product Discovery',
                    'Responsive Frontend Architecture',
                    'CMS or Dashboard Integration',
                    'Post-launch Technical Support',
                ],
                'button_text' => 'Start a Project',
                'button_url' => '/quote',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Game Development',
                'subtitle' => 'Pengembangan game Roblox kustom & scalable.',
                'price' => 'Starting at IDR 100K',
                'billing_period' => 'Starting at',
                'badge' => 'MOST POPULAR',
                'features' => [
                    'Cross-platform Experience',
                    'Custom Asset and Feature Build',
                    'Performance Optimization',
                    'Continuous QA and Iteration',
                ],
                'button_text' => 'Order Game Project',
                'button_url' => '/quote',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'UI/UX Design Sprint',
                'subtitle' => 'Desain interface dan sistem visual berstandar industri.',
                'price' => 'Starting at IDR 200K',
                'billing_period' => 'Starting at',
                'badge' => null,
                'features' => [
                    'Research-backed Wireframing',
                    'High-fidelity Prototyping',
                    'Collaborative Design Reviews',
                    'Complete Figma Source Files',
                ],
                'button_text' => 'Consult Design',
                'button_url' => '/quote',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($plans as $plan) {
            PricingPlan::updateOrCreate(
                ['title' => $plan['title']],
                $plan
            );
        }
    }
}
