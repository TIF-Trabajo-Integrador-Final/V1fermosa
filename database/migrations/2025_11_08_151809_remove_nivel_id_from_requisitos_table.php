<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('requisitos', function (Blueprint $table) {
            // Eliminamos la clave foránea y la columna
            $table->dropForeign(['nivel_id']);
            $table->dropColumn('nivel_id');
        });
    }

    public function down(): void
    {
        Schema::table('requisitos', function (Blueprint $table) {
            $table->foreignId('nivel_id')->constrained('nivels')->onDelete('cascade');
        });
    }
};
