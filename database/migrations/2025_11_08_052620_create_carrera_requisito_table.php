<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carrera_requisito', function (Blueprint $table) {
            $table->foreignId('carrera_id')->constrained('carreras')->onDelete('cascade');
            $table->foreignId('requisito_id')->constrained('requisitos')->onDelete('cascade');

            // ✅ Clave primaria compuesta
            $table->primary(['carrera_id', 'requisito_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carrera_requisito');
    }
};
