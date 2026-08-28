<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@nusagaruda.com'],
            [
                'name' => 'Nusa Garuda Admin',
                'password' => Hash::make('password'),
            ]
        );

        $this->call([
            ProjectSeeder::class,
            TestimonialSeeder::class,
            FaqSeeder::class,
            TeamSeeder::class,
            GallerySeeder::class,
            InquirySeeder::class,
            QuoteSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            AccordionShowcaseSeeder::class,
            PopupBannerSeeder::class,
            CompanySettingSeeder::class,
            JobVacancySeeder::class,
            PricingPlanSeeder::class,
        ]);
    }
}
