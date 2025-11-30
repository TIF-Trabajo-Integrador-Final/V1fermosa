<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo CarreraRequisito
 * Representa la tabla pivote entre Carreras y Requisitos.
 * Conecta una carrera con uno o varios requisitos académicos.
 */
class CarreraRequisito extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla pivote.
     */
    protected $table = 'carrera_requisito';

    /**
     * Columnas asignables en masa.
     */
    protected $fillable = [
        'carrera_id',
        'requisito_id',
    ];

    /**
     * // CAMBIO: se mantiene en false porque la tabla pivote no usa timestamps.
     */
    public $timestamps = false;

    /**
     * // CAMBIO: casteo recomendado para mayor seguridad y limpieza de datos.
     */
    protected $casts = [
        'carrera_id'   => 'integer', // CAMBIO
        'requisito_id' => 'integer', // CAMBIO
    ];

    /**
     * Relación: este registro pertenece a una carrera.
     */
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }

    /**
     * Relación: este registro pertenece a un requisito.
     */
    public function requisito()
    {
        return $this->belongsTo(Requisito::class, 'requisito_id');
    }
}
