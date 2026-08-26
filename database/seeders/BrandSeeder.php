<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Penus',
                'logo_path' => '/images/mainpenus.png',
                'website_url' => 'https://penus.sch.id',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'RPL',
                'logo_path' => '/images/mainrpl.png',
                'website_url' => null,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'PT AYU RIZKY PRATAMA',
                'logo_path' => '/images/ptayurp.jpg',
                'website_url' => null,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Nusa Indo',
                'logo_path' => '/images/NusaIndolgo.png',
                'website_url' => null,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Kay Shoot',
                'logo_path' => '/images/kayshoot.png',
                'website_url' => null,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'LMS',
                'logo_path' => '/images/lms.png',
                'website_url' => null,
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(
                ['name' => $brand['name']],
                $brand
            );
        }
    }
}
