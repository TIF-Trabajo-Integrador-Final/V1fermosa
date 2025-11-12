<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150)->unique();

            // ✅ Se corrige a foreignId en lugar de string 'nivel'
            $table->foreignId('nivel_id')->constrained('niveles')->onDelete('cascade');

            $table->text('descripcion');
            $table->text('perfil_profesional')->nullable();
            $table->integer('duracion_meses')->unsigned();
            $table->json('convenio')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
