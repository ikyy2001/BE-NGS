<?php

namespace Database\Seeders;

use App\Models\JobVacancy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobVacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vacancies = [
            [
                'title' => 'Senior Luau / Roblox Scripter',
                'slug' => 'senior-luau-roblox-scripter',
                'department' => 'Game Development',
                'job_type' => 'Full-time',
                'work_location' => 'Remote',
                'experience_level' => 'Senior',
                'salary_range' => 'IDR 6.000.000 - 12.000.000',
                'description' => 'Kami mencari Senior Roblox Scripter yang berpengalaman dalam arsitektur OOP Luau, network replication, data stores yang handal, dan optimasi performa game multiplayer berskala besar.',
                'responsibilities' => [
                    'Mengembangkan sistem gameplay inti dan arsitektur modular dengan Luau.',
                    'Mengoptimalkan network bandwidth dan client-server replication.',
                    'Mengintegrasikan DataStore2 / ProfileService untuk keamanan data pemain.',
                    'Melakukan code review dan mentoring untuk junior developer.',
                ],
                'requirements' => [
                    'Pengalaman minimal 2-3 tahun dalam scripting game Roblox.',
                    'Menguasai Luau, Knit / Rodux / Roact / Fusion framework.',
                    'Portofolio game Roblox yang pernah dirilis atau dimainkan publik.',
                    'Kemampuan komunikasi dan problem-solving yang baik.',
                ],
                'benefits' => [
                    '100% Remote / Work from Anywhere.',
                    'Bonus performa berdasarkan kesuksesan game release.',
                    'Dukungan tools dan aset studio berlisensi.',
                    'Lingkungan tim yang kolaboratif dan inovatif.',
                ],
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => '3D Roblox Environment Artist & Modeler',
                'slug' => '3d-roblox-environment-artist-modeler',
                'department' => 'Game Development',
                'job_type' => 'Freelance',
                'work_location' => 'Remote',
                'experience_level' => 'Mid-Level',
                'salary_range' => 'Competitive / Project-based',
                'description' => 'Menciptakan aset 3D low-poly / stylized yang teroptimasi dengan baik untuk platform Roblox, mulai dari props, modular buildings, hingga lighting & atmospheric map design.',
                'responsibilities' => [
                    'Modeling aset 3D dengan Blender dan import ke Roblox Studio.',
                    'Mengatur PBR material, lighting, post-processing, dan atmosphere.',
                    'Memastikan poly count dan collision mesh teroptimasi untuk mobile & PC.',
                ],
                'requirements' => [
                    'Mahir menggunakan Blender dan Roblox Studio.',
                    'Memiliki portofolio 3D art atau build map Roblox.',
                    'Memahami teknik modular building dan UV unwrapping yang efisien.',
                ],
                'benefits' => [
                    'Jadwal kerja fleksibel berbasis milestone project.',
                    'Portofolio tampil di showcase studio Nusa Garuda.',
                ],
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Fullstack Web Developer (Laravel + React / Astro)',
                'slug' => 'fullstack-web-developer',
                'department' => 'Web Development',
                'job_type' => 'Full-time',
                'work_location' => 'Remote',
                'experience_level' => 'Mid-Level',
                'salary_range' => 'IDR 5.000.000 - 10.000.000',
                'description' => 'Membangun dan mengembangkan platform web performa tinggi, dashboard CMS, dan portal digital untuk klien enterprise studio Nusa Garuda.',
                'responsibilities' => [
                    'Mengembangkan backend RESTful API dengan Laravel dan Filament.',
                    'Membangun antarmuka frontend interaktif dengan React, TypeScript, dan TailwindCSS/Astro.',
                    'Integrasi payment gateway, webhook, dan third-party cloud services.',
                ],
                'requirements' => [
                    'Pengalaman 2+ tahun dengan stack PHP (Laravel) dan JavaScript/TypeScript (React).',
                    'Familiar dengan database MySQL/PostgreSQL dan caching.',
                    'Memahami konsep clean code, RESTful architecture, dan Git workflow.',
                ],
                'benefits' => [
                    'Flexible working hours & remote work.',
                    'BPJS & Tunjangan Hari Raya.',
                    'Kesempatan mengerjakan project teknologi tingkat lanjut.',
                ],
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($vacancies as $vacancy) {
            JobVacancy::updateOrCreate(
                ['slug' => $vacancy['slug']],
                $vacancy
            );
        }
    }
}
