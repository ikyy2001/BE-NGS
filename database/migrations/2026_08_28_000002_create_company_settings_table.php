<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_settings', function (Blueprint $table) {
            $table->id();
            $table->string('studio_name')->default('Nusa Garuda Studio');
            $table->string('tagline')->nullable()->default('Creative Technology & Game Development Studio');
            $table->string('phone')->nullable()->default('+62 821-6275-7576');
            $table->string('whatsapp_number')->nullable()->default('6282162757576');
            $table->string('email')->nullable()->default('info@nusagarudastudio.my.id');
            $table->string('address')->nullable()->default('Depok - Bogor, Indonesia');
            $table->text('google_maps_url')->nullable();
            $table->string('discord_url')->nullable();
            $table->string('roblox_group_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('copyright_text')->nullable()->default('Design By Nusa Garuda Studio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_settings');
    }
};
