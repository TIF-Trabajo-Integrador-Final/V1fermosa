<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateOfertasTable extends Migration
{
public function up()
{
Schema::create('ofertas', function (Blueprint $table) {
$table->id();
$table->unsignedBigInteger('carrera_id')->nullable();
$table->unsignedBigInteger('sede_id')->nullable();
$table->string('titulo');
$table->text('descripcion')->nullable();
$table->date('fecha_inicio')->nullable();
$table->date('fecha_fin')->nullable();
$table->boolean('activo')->default(true);
$table->timestamps();


$table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('set null');
$table->foreign('sede_id')->references('id')->on('sedes')->onDelete('set null');
});
}


public function down()
{
Schema::dropIfExists('ofertas');
}
}