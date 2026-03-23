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
        Schema::create('actor_pelicula', function (Blueprint $table) {
            $table->id();
            // Crea la columna actor_id i la connecta amb la taula actores
            $table->foreignId('actor_id')->constrained('actores')->onDelete('cascade');
            // Crea la columna pelicula_id i la connecta amb la taula peliculas
            $table->foreignId('pelicula_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actor_pelicula');
    }
};
