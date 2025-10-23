<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Plan extends Model
{
use HasFactory;
protected $fillable = ['carrera_id','codigo','nombre','contenido','anio_aprobacion'];


public function carrera() { return $this->belongsTo(Carrera::class); }
}