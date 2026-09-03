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
                'category' => 'general',
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
                'title' => 'Starter / Mini Game Roblox',
                'category' => 'roblox',
                'subtitle' => 'Ideal untuk obby platformer, simulator dasar, map showcase, atau prototype mekanik game.',
                'price' => 'Rp 1.500.000',
                'billing_period' => '7 - 14 Hari Kerja',
                'badge' => 'Cocok untuk Pemula',
                'features' => [
                    'Core gameplay loop (Obby / Simple Simulator)',
                    'Dasar penyimpanan data (DataStore Coin/Level)',
                    'UI Menu dasar responsif Mobile & PC',
                    'Map environment compact & lighting optimal',
                    'Integrasi 2-3 Gamepass Robux',
                    'Garansi bug fix 14 hari pasca serah terima',
                ],
                'button_text' => 'Pilih Paket Starter',
                'button_url' => '/quote?service=roblox-starter',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Pro Game Experience Roblox',
                'category' => 'roblox',
                'subtitle' => 'Untuk game action, PvP arena, Tycoon, dungeon RPG, atau game dengan loop retensi tinggi.',
                'price' => 'Rp 5.500.000',
                'billing_period' => '3 - 5 Minggu',
                'badge' => 'Paling Populer',
                'features' => [
                    'Mekanik gameplay kompleks (Combat, Tycoon, Leveling)',
                    'Arsitektur Luau modular (ProfileService anti-data loss)',
                    'Custom 3D modeling Blender (Senjata, Prop, Karakter)',
                    'Full UI/UX modern dengan animasi tweening',
                    'Anti-Cheat & Authoritative Server Protection',
                    'Sistem monetisasi lengkap (Shop, Gamepass, Gacha/Crates)',
                    'Leaderboard, Daily Rewards & Achievement',
                    'Garansi & pendampingan bug 30 hari',
                ],
                'button_text' => 'Pilih Paket Pro',
                'button_url' => '/quote?service=roblox-pro',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Custom Open-World / RP Roblox',
                'category' => 'roblox',
                'subtitle' => 'Game berskala masif: Roleplay kota Indonesia, MMORPG, Brand Metaverse Experience, custom server ecosystem.',
                'price' => 'Rp 15.000.000',
                'billing_period' => '6 - 10 Minggu',
                'badge' => 'Full Custom Scale',
                'features' => [
                    'Full custom GDD (Game Design Document) terencana',
                    'Map kota/open-world luas dengan StreamingEnabled',
                    'Multi-job system, vehicle physics & inventory slot',
                    'Server-to-Server communication (MemoryStore & External API)',
                    'Keamanan server tingkat lanjut anti exploit & bypass',
                    'Full asset source (.rbxl, Blender, Git/Rojo)',
                    'Konsultasi strategi launch, DevEx, & marketing Roblox',
                    'Garansi & support pemeliharaan 60 hari',
                ],
                'button_text' => 'Konsultasi Project Custom',
                'button_url' => '/contact?service=roblox-custom',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'UI/UX Design Sprint',
                'category' => 'design',
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
                'sort_order' => 5,
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
