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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tour_id')->constrained();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email');
            $table->string('telefono');
            $table->integer('adultos');
            $table->integer('ninos');
            $table->string('status')->default('pendiente');
            $table->decimal('precio_total', 8, 2);

            $table->string('tipo_cama')->nullable(); // 'twin' или 'queen'
            $table->boolean('cama_extra')->default(false); // была ли доп. кровать

            $table->string('nombre2')->nullable();
            $table->string('apellido2')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
