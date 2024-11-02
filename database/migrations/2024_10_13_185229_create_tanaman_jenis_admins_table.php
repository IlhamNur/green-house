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
        Schema::create('tanamanjenisadmins', function (Blueprint $table) {
            $table->id();
            $table->string('picture')->nullable();
            $table->string('name')->index();
            $table->string('latin_name');
            $table->unsignedInteger('temperature');
            $table->unsignedInteger('humidity');
            $table->unsignedInteger('soil_max');
            $table->unsignedInteger('soil_min');
            $table->unsignedInteger('light_intensity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanaman_jenis_admins');
    }
};
