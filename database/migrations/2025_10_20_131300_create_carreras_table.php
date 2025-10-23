<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCarrerasTable extends Migration
{
public function up()
{
Schema::create('carreras', function (Blueprint $table) {
$table->id();
$table->string('nombre');
$table->string('nivel'); // terciario, posgrado, tecnicatura, etc
$table->decimal('arancel_matricula', 10, 2)->nullable();
$table->decimal('arancel_mensual', 10, 2)->nullable();
$table->text('descripcion')->nullable();
$table->timestamps();
});
}


public function down()
{
Schema::dropIfExists('carreras');
}
}
