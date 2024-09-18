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
        Schema::create('plant_lists', function (Blueprint $table) {
            $table->id();
            $table->string('plant_name');
            $table->string('picture');
            $table->string('latin_name');
            $table->integer('temperature');
            $table->integer('humidity');
            $table->integer('nutrition');
            $table->integer('light');
            $table->integer('ph');
            $table->integer('water_level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant_lists');
    }
};
