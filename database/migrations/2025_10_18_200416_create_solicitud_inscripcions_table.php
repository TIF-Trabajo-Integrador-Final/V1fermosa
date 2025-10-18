<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones (crea la tabla solicitudes_inscripcion).
     */
    public function up(): void
    {
        Schema::create('solicitudes_inscripcion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('email');
            $table->string('telefono')->nullable();
            $table->string('carrera_interes'); // Carrera de interés seleccionada
            $table->text('mensaje')->nullable();
            $table->boolean('procesado')->default(false); // Para seguimiento administrativo
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones (elimina la tabla).
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes_inscripcion');
    }
};