<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Requisito extends Model
{
use HasFactory;
protected $fillable = ['carrera_id','titulo','detalle','publico'];


public function carrera() { return $this->belongsTo(Carrera::class); }
}
