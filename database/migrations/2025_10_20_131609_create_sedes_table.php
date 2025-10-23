<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateSedesTable extends Migration
{
public function up()
{
Schema::create('sedes', function (Blueprint $table) {
$table->id();
$table->string('nombre');
$table->string('pais');
$table->string('provincia')->nullable();
$table->string('localidad')->nullable();
$table->string('direccion')->nullable();
$table->decimal('lat', 10, 7)->nullable();
$table->decimal('lng', 10, 7)->nullable();
$table->timestamps();
});
}


public function down()
{
Schema::dropIfExists('sedes');
}
}