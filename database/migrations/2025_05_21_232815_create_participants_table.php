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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('fio');
            $table->string('telephone');
            $table->string('email');
            $table->string('region');
            $table->string('status');
            $table->string('workplace')->nullable();
            $table->string('study_place')->nullable();
            $table->string('study_level')->nullable();
            $table->string('specialization')->nullable();
            $table->string('team')->nullable();
            $table->text('interests');
            $table->text('expertise');
            $table->text('interest_fact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
