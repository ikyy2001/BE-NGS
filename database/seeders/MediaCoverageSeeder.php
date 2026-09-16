<?php

namespace Database\Seeders;

use App\Models\MediaCoverage;
use Illuminate\Database\Seeder;

class MediaCoverageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Nusa Garuda Studio Dorong Digitalisasi Sekolah Lewat Game Roblox',
                'slug' => 'nusa-garuda-studio-dorong-digitalisasi-sekolah-lewat-game-roblox',
                'outlet_name' => 'Kompas.com',
                'cover_image' => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=1200&q=80',
                'excerpt' => 'Studio teknologi kreatif asal Indonesia mengembangkan pengalaman belajar interaktif di Roblox untuk sekolah dan kampus.',
                'body' => '<p>Nusa Garuda Studio menjadi sorotan setelah merilis inisiatif digitalisasi sekolah berbasis pengalaman interaktif di Roblox. Pendekatan ini memadukan kurikulum, desain ruang virtual, dan sistem pembelajaran yang bisa diakses siswa dari perangkat yang sudah mereka gunakan sehari-hari.</p><p>Menurut tim studio, tujuan utamanya bukan sekadar membuat game, melainkan membangun ekosistem belajar yang terasa hidup: siswa bisa menjelajah kampus virtual, mengikuti simulasi, dan berkolaborasi dalam misi yang terhubung dengan materi pelajaran.</p><p>Model ini dinilai relevan untuk lembaga pendidikan yang ingin memperkenalkan teknologi tanpa membebani infrastruktur lama. Siswa cukup masuk ke pengalaman Roblox, sementara sekolah tetap punya kontrol atas konten, identitas visual, dan alur pembelajaran.</p>',
                'source_url' => 'https://www.kompas.com',
                'is_published' => true,
                'sort_order' => 1,
                'published_at' => now()->subDays(18),
            ],
            [
                'title' => 'Studio Lokal Bangun Platform Web dan LMS untuk Lembaga Pendidikan',
                'slug' => 'studio-lokal-bangun-platform-web-dan-lms-untuk-lembaga-pendidikan',
                'outlet_name' => 'DetikInet',
                'cover_image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=80',
                'excerpt' => 'Selain game, Nusa Garuda Studio juga merancang website sekolah, PPDB online, dan sistem ujian CBT untuk kebutuhan operasional harian.',
                'body' => '<p>Selain pengembangan game, Nusa Garuda Studio juga dikenal lewat layanan platform web untuk sekolah. Produknya mencakup website institusi, PPDB online, hingga LMS dan ujian berbasis komputer (CBT).</p><p>Pendekatan fullstack ini membuat sekolah tidak perlu merangkai banyak vendor terpisah. Data pendaftaran, konten akademik, dan evaluasi siswa bisa berjalan dalam satu ekosistem yang dirancang khusus untuk operasional pendidikan di Indonesia.</p><p>Liputan ini menyoroti bagaimana studio lokal mampu menyeimbangkan kebutuhan teknis dengan pengalaman pengguna yang sederhana bagi guru, siswa, dan orang tua.</p>',
                'source_url' => 'https://inet.detik.com',
                'is_published' => true,
                'sort_order' => 2,
                'published_at' => now()->subDays(40),
            ],
            [
                'title' => 'Creative Tech Studio Indonesia Perkuat Ekosistem Game Roleplay di Roblox',
                'slug' => 'creative-tech-studio-indonesia-perkuat-ekosistem-game-roleplay-di-roblox',
                'outlet_name' => 'CNN Indonesia',
                'cover_image' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=1200&q=80',
                'excerpt' => 'Pengembangan roleplay skala besar, sistem ekonomi in-game, dan arsitektur server menjadi fokus liputan media teknologi.',
                'body' => '<p>Nusa Garuda Studio masuk dalam peta pengembang game Roblox di Indonesia berkat pendekatan engineering yang lebih serius: arsitektur server, sistem ekonomi in-game, dan pengalaman roleplay yang bisa diskalakan.</p><p>Dalam beberapa proyek, studio ini merancang dunia virtual yang bukan hanya visual, tetapi juga punya loop permainan yang jelas. Pemain bisa bekerja, berinteraksi, dan tumbuh di dalam ekosistem yang dirancang dengan aturan yang terukur.</p><p>Liputan ini menempatkan studio sebagai contoh bagaimana industri kreatif digital lokal bisa bersaing di platform global tanpa meninggalkan identitas Indonesia.</p>',
                'source_url' => 'https://www.cnnindonesia.com',
                'is_published' => true,
                'sort_order' => 3,
                'published_at' => now()->subDays(62),
            ],
            [
                'title' => 'Nusa Garuda Studio Jadi Mitra Teknologi untuk Transformasi Digital Institusi',
                'slug' => 'nusa-garuda-studio-jadi-mitra-teknologi-untuk-transformasi-digital-institusi',
                'outlet_name' => 'Tempo',
                'cover_image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80',
                'excerpt' => 'Dari brief proyek hingga implementasi, studio ini membantu institusi merancang solusi digital yang siap produksi.',
                'body' => '<p>Transformasi digital institusi sering tertahan di tahap konsep. Nusa Garuda Studio mencoba memotong jarak itu dengan proses yang lebih praktis: discovery, desain, pengembangan, lalu serah terima yang rapi.</p><p>Media menyoroti cara kerja studio yang menggabungkan layanan game, web, dan solusi kustom. Institusi pendidikan maupun organisasi lain bisa memulai dari brief, lalu menerima rencana implementasi yang jelas termasuk timeline dan ruang lingkup.</p><p>Dengan model ini, teknologi tidak berhenti sebagai demo, melainkan menjadi sistem yang dipakai sehari-hari.</p>',
                'source_url' => 'https://www.tempo.co',
                'is_published' => true,
                'sort_order' => 4,
                'published_at' => now()->subDays(90),
            ],
        ];

        foreach ($items as $item) {
            MediaCoverage::updateOrCreate(
                ['slug' => $item['slug']],
                $item
            );
        }
    }
}
