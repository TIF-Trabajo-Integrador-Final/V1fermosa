<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('requisitos', function (Blueprint $table) {
            // Si ya existe, primero eliminamos la columna carrera_id
            if (Schema::hasColumn('requisitos', 'carrera_id')) {
                $table->dropForeign(['carrera_id']);
                $table->dropColumn('carrera_id');
            }

            // Agregamos la columna nivel_id
            $table->foreignId('nivel_id')->constrained('niveles')->onDelete('cascade')->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('requisitos', function (Blueprint $table) {
            $table->dropForeign(['nivel_id']);
            $table->dropColumn('nivel_id');

            $table->foreignId('carrera_id')->constrained('carreras')->onDelete('cascade')->after('id');
        });
    }
};
