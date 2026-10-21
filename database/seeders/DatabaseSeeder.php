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
        $adminEmail = env('ADMIN_EMAIL', 'admin@nusagaruda.com');
        $adminPassword = env('ADMIN_PASSWORD');

        if (! User::where('email', $adminEmail)->exists()) {
            User::create([
                'name' => env('ADMIN_NAME', 'Nusa Garuda Admin'),
                'email' => $adminEmail,
                'password' => Hash::make($adminPassword ?: \Illuminate\Support\Str::random(16)),
            ]);
        }

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
            MediaCoverageSeeder::class,
            AccordionShowcaseSeeder::class,
            PopupBannerSeeder::class,
            CompanySettingSeeder::class,
            JobVacancySeeder::class,
            PricingPlanSeeder::class,
        ]);
    }
}
