<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePlanesTable extends Migration
{
public function up()
{
Schema::create('planes', function (Blueprint $table) {
$table->id();
$table->unsignedBigInteger('carrera_id');
$table->string('codigo')->nullable();
$table->string('nombre');
$table->text('contenido')->nullable(); // json o texto con materias
$table->year('anio_aprobacion')->nullable();
$table->timestamps();


$table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
});
}


public function down()
{
Schema::dropIfExists('planes');
}
}