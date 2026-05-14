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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();

            $table->string('titulo', 64);
            $table->string('pais', 64);
            $table->string('inicio_fin', 64); // Например, "SEVILLA"
            $table->string('ciudades_texto', 100); // Строка типа "Sevilla - Jerez - Cádiz"
            $table->json('ciudades_list'); // массив ["Sevilla", "Jerez", "Cádiz"]
            $table->text('texto'); // Главное описание
            $table->string('excursion_titulo', 100); // "¡Tradiciones del Sur!"
            $table->integer('duracion');
            $table->string('status', 64);
            $table->integer('cantidad')->default(20);

            // Картинки (в БД храним только пути/названия файлов)
            $table->string('imagen_principal')->nullable();
            $table->string('imagen_section1')->nullable();
            $table->string('imagen_incluido')->nullable();
            $table->string('imagen_no_incluido')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
