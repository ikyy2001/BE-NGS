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
        Schema::table('inquiries', function (Blueprint $table) {
            $table->string('phone', 30)->default('')->after('email');
        });

        Schema::table('quotes', function (Blueprint $table) {
            $table->string('phone', 30)->default('')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn('phone');
        });

        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn('phone');
        });
    }
};
