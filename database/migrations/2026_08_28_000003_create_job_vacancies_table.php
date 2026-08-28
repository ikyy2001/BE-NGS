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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('department')->default('Game Development');
            $table->string('job_type')->default('Full-time');
            $table->string('work_location')->default('Remote');
            $table->string('experience_level')->default('Mid-Level');
            $table->string('salary_range')->nullable();
            $table->text('description');
            $table->json('requirements')->nullable();
            $table->json('responsibilities')->nullable();
            $table->json('benefits')->nullable();
            $table->date('deadline')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
