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
        Schema::create('tour_days', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tour_id')->constrained()->onDelete('cascade');

            $table->string('dia_label', 64); // "Día 1 — Sevilla"
            $table->string('titulo', 10); // "Día 1"
            $table->string('imagen')->nullable();
            $table->json('descripcion'); // Массив строк с описанием активностей

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_days');
    }
};
