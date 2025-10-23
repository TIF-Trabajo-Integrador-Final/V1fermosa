<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Carrera extends Model
{
use HasFactory;
protected $fillable = ['nombre','nivel','arancel_matricula','arancel_mensual','descripcion'];


public function planes() { return $this->hasMany(Plan::class); }
public function ofertas() { return $this->hasMany(Oferta::class); }
public function requisitos() { return $this->hasMany(Requisito::class); }
}