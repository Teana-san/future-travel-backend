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
        Schema::create('tour_dates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tour_id')->constrained()->onDelete('cascade'); 
            $table->string('mes');      // например: 'marzo'
            $table->string('label');    // например: '01-03-2026 - 04-03-2026'
            $table->string('value');    // например: 'marzo1'
            $table->integer('precio');  

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_dates');
    }
};
