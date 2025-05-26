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
        Schema::create('predictive_analyses', function (Blueprint $table) {
            $table->id();
            $table->string('historical_data'); // datos históricos
            $table->string('climatic_conditions'); // condiciones climáticas
            $table->string('market_variables'); // variables del mercado
            $table->text('recommendations')->nullable(); // recomendaciones u observaciones
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predictive_analyses');
    }
};
