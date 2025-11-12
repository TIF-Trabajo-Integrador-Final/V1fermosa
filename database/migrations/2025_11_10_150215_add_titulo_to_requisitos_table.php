<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('requisitos', function (Blueprint $table) {
            // Agregar la columna 'titulo'
            $table->string('titulo', 255)->after('id');  // Asegúrate de que se agregue después de 'id' o en el lugar correcto
        });
    }

    public function down(): void
    {
        Schema::table('requisitos', function (Blueprint $table) {
            // Eliminar la columna 'titulo' si revertimos la migración
            $table->dropColumn('titulo');
        });
    }
};
