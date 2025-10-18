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
    Schema::create('carreras', function (Blueprint $table) {
        $table->id();
        $table->string('nombre')->unique();
        $table->string('slug')->unique(); // Para URLs amigables
        $table->text('descripcion_corta');
        $table->text('descripcion_larga')->nullable();
        $table->string('duracion');
        $table->string('titulo_otorgado');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
