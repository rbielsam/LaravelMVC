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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id(); // Crea una clau primària autoincremental
            $table->string('titulo'); // Crea un VARCHAR(255) per al títol
            $table->string('pais');
            $table->integer('anyo_estreno');
            $table->integer('num_premios');
            $table->integer('num_nominaciones_a_oscar');
            $table->timestamps(); // Crea les columnes created_at i updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
