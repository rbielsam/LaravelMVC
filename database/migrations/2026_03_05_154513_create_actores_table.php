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
        Schema::create('actores', function (Blueprint $table) {
            $table->id(); // Crea una clau primària autoincremental
            $table->string('nombre'); // Crea un VARCHAR(255) per al nom
            $table->date('fecha_nacimiento');
            $table->string('pais');
            $table->boolean('ha_fallecido');
            $table->integer('num_oscar');
            $table->timestamps(); // Crea les columnes created_at i updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actores');
    }
};
