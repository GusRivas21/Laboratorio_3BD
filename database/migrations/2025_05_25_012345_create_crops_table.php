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
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->string('planting_variety'); // variedad siembra
            $table->date('sowing_date'); // fecha de siembra
            $table->string('expected_growth_cycle'); // ciclo de crecimiento esperado
            $table->text('nutritional_requirements'); // requerimientos nutricionales
            $table->text('pest_resistance'); // resistencia a plagas
            $table->text('optimal_climatic_conditions'); // condiciones climáticas óptimas
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crops');
    }
};
