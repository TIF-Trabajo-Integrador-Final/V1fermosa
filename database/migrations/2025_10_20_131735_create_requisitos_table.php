<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateRequisitosTable extends Migration
{
public function up()
{
Schema::create('requisitos', function (Blueprint $table) {
$table->id();
$table->unsignedBigInteger('carrera_id')->nullable(); // si aplica a carrera
$table->string('titulo');
$table->text('detalle')->nullable();
$table->boolean('publico')->default(true);
$table->timestamps();


$table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('set null');
});
}


public function down()
{
Schema::dropIfExists('requisitos');
}
}