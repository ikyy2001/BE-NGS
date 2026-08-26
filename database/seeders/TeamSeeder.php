<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            [
                'name' => 'Nusa Chief Founder',
                'role' => 'Founder & Managing Director',
                'image_url' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=400&q=80',
                'sort_order' => 1,
            ],
            [
                'name' => 'Garuda Tech Lead',
                'role' => 'CTO & Principal Software Architect',
                'image_url' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&q=80',
                'sort_order' => 2,
            ],
            [
                'name' => 'Rizky Roblox Dev',
                'role' => 'Lead Roblox Developer & Luau Specialist',
                'image_url' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=400&q=80',
                'sort_order' => 3,
            ],
            [
                'name' => 'Dewi Fullstack',
                'role' => 'Senior Fullstack Web Engineer',
                'image_url' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=400&q=80',
                'sort_order' => 4,
            ],
            [
                'name' => 'Aris UI/3D Artist',
                'role' => 'Lead UI/UX Designer & 3D Modeler',
                'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80',
                'sort_order' => 5,
            ],
            [
                'name' => 'Fajar DevOps',
                'role' => 'DevOps & Cloud Infrastructure Lead',
                'image_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=400&q=80',
                'sort_order' => 6,
            ],
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }
    }
}
