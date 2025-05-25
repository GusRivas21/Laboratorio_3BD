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
        Schema::create('irrigation_systems', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_date'); // fecha de inicio del riego
            $table->dateTime('end_date');   // fecha de finalización del riego
            $table->text('weather_prediction'); // predicción meteorológica
            $table->text('specific_needs'); // necesidades específicas
            $table->foreignId('crop_id')->constrained('crops')->onDelete('cascade');
            $table->foreignId('sensor_id')->constrained('sensors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irrigation_systems');
    }
};
