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
        Schema::create('list_greenhouses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_user');
            $table->string('name')->index();
            $table->unsignedInteger('id_tanaman')->nullable();
            $table->boolean('pin_status')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_greenhouse');
            $table->unsignedInteger('temperature');
            $table->unsignedInteger('humidity');
            $table->unsignedInteger('ph');
            $table->unsignedInteger('soil_moisture');
            $table->unsignedInteger('light_intensity');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('list_greenhouse');
        Schema::drop('sensor_data');
    }
};
