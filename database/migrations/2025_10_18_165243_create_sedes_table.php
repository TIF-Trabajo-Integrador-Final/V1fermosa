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
    Schema::create('sedes', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('direccion');
        $table->string('telefono')->nullable();
        $table->text('mapa_url')->nullable(); // Para el iframe de Google Maps
        $table->timestamps();
    });
 }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sedes');
    }
};
