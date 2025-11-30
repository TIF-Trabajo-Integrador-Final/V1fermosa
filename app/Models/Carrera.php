<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Carrera
 * Representa una carrera académica vinculada a un nivel y a múltiples requisitos.
 */
class Carrera extends Model
{
    use HasFactory;

    /**
     * Columnas asignables en masa.
     */
    protected $fillable = [
        'nombre',
        'nivel_id',
        'modalidad',
        'descripcion',
        'perfil_profesional',
        'duracion_meses',
        'imagen',
    ];

    /**
     * // CAMBIO: casteo recomendado para evitar errores al guardar/editar.
     */
    protected $casts = [
        'duracion_meses' => 'integer', // CAMBIO
    ];

    /**
     * Relación: una carrera pertenece a un nivel.
     */
    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'nivel_id');
    }

    /**
     * Relación: una carrera tiene muchos requisitos (many to many).
     */
    public function requisitos()
    {
        return $this->belongsToMany(Requisito::class, 'carrera_requisito', 'carrera_id', 'requisito_id');
    }
}
