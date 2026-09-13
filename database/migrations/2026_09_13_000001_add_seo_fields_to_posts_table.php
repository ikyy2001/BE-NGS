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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('primary_keyword')->nullable()->after('slug')->index();
            $table->text('secondary_keywords')->nullable()->after('primary_keyword');
            $table->string('meta_title')->nullable()->after('secondary_keywords');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('canonical_url')->nullable()->after('meta_description');
            $table->string('schema_type')->default('BlogPosting')->after('canonical_url');
            $table->string('og_image')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn([
                'primary_keyword',
                'secondary_keywords',
                'meta_title',
                'meta_description',
                'canonical_url',
                'schema_type',
                'og_image',
            ]);
        });
    }
};
