<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Requisito
 * Representa un requisito académico que puede pertenecer
 * a múltiples carreras dentro de la institución.
 */
class Requisito extends Model
{
    use HasFactory;

    /**
     * Atributos asignables en masa.
     */
    protected $fillable = [
        'descripcion',
    ];

    /**
     * // CAMBIO: se agregan casts recomendados para mayor integridad.
     */
    protected $casts = [
        'descripcion' => 'string', // CAMBIO
    ];

    /**
     * Relación Many-to-Many con Carreras.
     * Un requisito puede corresponder a muchas carreras.
     */
    public function carreras()
    {
        return $this->belongsToMany(
            Carrera::class,
            'carrera_requisito',
            'requisito_id',
            'carrera_id'
        );
    }
}
