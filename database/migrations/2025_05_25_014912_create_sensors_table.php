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
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();

            $table->string('location'); // ubicación del sensor
            $table->string('status'); // estado del sensor
            $table->float('soil_moisture'); // humedad del suelo
            $table->float('room_temperature'); // temperatura ambiente
            $table->float('precipitation'); // precipitación
            $table->float('wind_speed'); // velocidad del viento
            $table->float('ph_level'); // nivel de pH
            $table->float('available_nutrients'); // nutrientes disponibles
            $table->dateTime('data_date'); // fecha del dato
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade');
            $table->foreignId('type_sensor_id')->constrained('type_sensors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensors');
    }
};
