<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carrera; // necesario para la relación

/**
 * Modelo Nivel
 * Adaptado a la migración REAL: solo 'id', 'nombre' y timestamps.
 */
class Nivel extends Model
{
  use HasFactory;

  protected $table = 'niveles';


  /**
   * Atributos que pueden asignarse masivamente.
   * CAMBIO: Se elimina 'descripcion' porque NO existe en la migración.
   */
  protected $fillable = [
    'nombre',
  ];

  /**
   * Casts correspondientes a columnas reales.
   */
  protected $casts = [
    'nombre' => 'string',
  ];

  /**
   * Relación: un nivel tiene muchas carreras.
   */
  public function carreras()
  {
    return $this->hasMany(Carrera::class, 'nivel_id');
  }
}
