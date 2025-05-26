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
        Schema::create('supply_management', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // tipo de insumo
            $table->string('name'); // nombre del insumo
            $table->dateTime('application_date'); // fecha de aplicación
            $table->float('quantity_used'); // cantidad utilizada
            $table->string('observed_effectiveness'); // efectividad observada
            $table->foreignId('crop_id')->constrained('crops')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_management');
    }
};
