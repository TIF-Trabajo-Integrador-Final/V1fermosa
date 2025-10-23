<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Oferta extends Model
{
use HasFactory;
protected $fillable = ['carrera_id','sede_id','titulo','descripcion','fecha_inicio','fecha_fin','activo'];


public function carrera() { return $this->belongsTo(Carrera::class); }
public function sede() { return $this->belongsTo(Sede::class); }
}