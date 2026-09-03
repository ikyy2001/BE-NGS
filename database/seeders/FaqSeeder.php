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
            [
                'category' => 'roblox',
                'title' => 'Berapa estimasi biaya jasa pembuatan game Roblox di Nusa Garuda Studio?',
                'description' => 'Biaya jasa pembuatan game Roblox disesuaikan dengan skala dan kompleksitas game. Untuk prototype, mini game, atau obby custom mulai dari Rp 1.500.000. Untuk game bertipe Simulator, PvP Arena, atau Tycoon berkisar antara Rp 4.000.000 - Rp 15.000.000. Sedangkan game skala besar seperti Open-World Roleplay (RP) custom map Indonesia dengan backend database kompleks dimulai dari Rp 15.000.000+. Kami juga menerima pengerjaan per modul script / sistem mekanik spesifik.',
                'sort_order' => 9,
                'is_active' => true,
            ],
            [
                'category' => 'roblox',
                'title' => 'Berapa lama proses pembuatan game Roblox dari awal hingga selesai?',
                'description' => 'Waktu pengerjaan bergantung pada cakupan Game Design Document (GDD). Mini game atau obby biasanya membutuhkan 1 - 2 minggu. Game mekanik menengah (Simulator, Arena PvP, Tycoon) sekitar 3 - 6 minggu. Sedangkan game kompleks seperti MMORPG atau Roleplay multi-sistem membutuhkan 6 - 12 minggu dengan sprint mingguan dan demo build berkala.',
                'sort_order' => 10,
                'is_active' => true,
            ],
            [
                'category' => 'roblox',
                'title' => 'Apakah saya mendapatkan full source code, file .rbxl, dan aset kepemilikan?',
                'description' => 'Ya, 100%! Setelah serah terima proyek selesai, Anda menerima file place Roblox (.rbxl / .rbxlx), repositori Git/Rojo (jika menggunakan workflow Rojo), 3D model .blend / .fbx, UI spritesheet, serta dokumentasi teknis lengkap. Anda memiliki hak kepemilikan komersial penuh atas game tersebut.',
                'sort_order' => 11,
                'is_active' => true,
            ],
            [
                'category' => 'roblox',
                'title' => 'Bagaimana Nusa Garuda Studio mengamankan game Roblox dari Exploit & Cheater?',
                'description' => 'Kami menerapkan arsitektur Authoritative Server (Server-Side Validation). Logika kritis seperti pengurangan uang, pembelian item, health, damage, teleport, dan inventaris selalu divalidasi ketat di sisi Server. RemoteEvents dan RemoteFunctions dilengkapi enkripsi data, rate limiting (anti-spam), sanity check, serta sistem Anti-Noclip dan Anti-Speedhack bawaan.',
                'sort_order' => 12,
                'is_active' => true,
            ],
            [
                'category' => 'roblox',
                'title' => 'Apakah Nusa Garuda Studio bisa membuat game Roleplay Indonesia (Map Indonesia)?',
                'description' => 'Bisa dan ini adalah salah satu keunggulan utama kami! Kami berpengalaman merancang game bertema Indonesia, seperti map kota/desa khas Indonesia, kendaraan custom (motor, mobil polisi, bus), sistem pekerjaan (kurir, polisi, mekanik), sistem ekonomi rupiah/uang virtual, hingga sistem voice chat interaktif.',
                'sort_order' => 13,
                'is_active' => true,
            ],
            [
                'category' => 'roblox',
                'title' => 'Bagaimana sistem monetisasi game agar bisa menghasilkan Robux dan DevEx?',
                'description' => 'Kami membantu merancang Game Economy Loop yang sehat: konfigurasi Gamepass (VIP, Game Boosters, Cosmetic items), Developer Products (beli koin instan, gacha/crates yang compliant dengan Roblox TOS), Daily Rewards, dan Battle Pass / Season Pass. Monetisasi ini dioptimalkan agar pemain betah bermain lama (retensi tinggi) dan terdorong membeli Robux.',
                'sort_order' => 14,
                'is_active' => true,
            ],
            [
                'category' => 'roblox',
                'title' => 'Apakah game yang dibuat dioptimasi untuk pemain HP / Mobile Android & iOS?',
                'description' => 'Tentu saja. Lebih dari 70% pemain Roblox bermain di perangkat Mobile. Semua game yang kami bangun menerapkan UI responsif touchscreen, optimasi part (StreamingEnabled, LOD mesh, minimal texture overload), dan penyesuaian control touch virtual joystick agar berjalan stabil di 60 FPS tanpa lag atau overheating.',
                'sort_order' => 15,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['title' => $faq['title']],
                $faq
            );
        }
    }
}
