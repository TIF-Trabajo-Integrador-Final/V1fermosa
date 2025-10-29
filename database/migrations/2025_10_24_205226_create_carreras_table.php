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
        $table->string('nombre', 150)->unique();
        $table->string('nivel', 50); // Nivel: terciario, posgrados, etc.
        $table->text('descripcion');
        $table->decimal('arancel_matricula', 8, 2)->default(0.00);
        $table->decimal('arancel_mensual', 8, 2)->default(0.00);
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
