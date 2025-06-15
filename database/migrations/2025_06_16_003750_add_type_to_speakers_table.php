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
        Schema::table('speakers', function (Blueprint $table) {
            $table->enum('type', ['спикер', 'эксперт'])
                ->default('спикер')
                ->after('name')
                ->comment('Тип спикера: speaker - спикер, moderator - модератор');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('speakers', function (Blueprint $table) {
            //
        });
    }
};
