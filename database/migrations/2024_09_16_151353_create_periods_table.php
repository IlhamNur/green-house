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
        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gh_id')->constrained('greenhouses')->cascadeOnDelete();
            $table->string('plant_type');
            $table->integer('temperature');
            $table->integer('humidity');
            $table->integer('nutrition');
            $table->integer('light');
            $table->integer('water_f');
            $table->integer('water_e');
            $table->integer('period');
            $table->integer('harvest_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periods');
    }
};
