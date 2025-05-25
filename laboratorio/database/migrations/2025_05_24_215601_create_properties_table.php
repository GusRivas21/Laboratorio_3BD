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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('geographic_location'); // ubicación geográfica
            $table->float('total_area'); // extensión total
            $table->string('soil_type'); // tipo de suelo
            $table->string('prevailing_climate'); // clima predominante
            $table->string('water_sources'); // fuentes de agua disponibles
            $table->boolean('organic_certification')->default(false); // certificaciones orgánicas
            $table->foreignId('farmer_id')->constrained('farmers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
