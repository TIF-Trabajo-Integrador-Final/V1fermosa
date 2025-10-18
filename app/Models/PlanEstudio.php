<?php

// app/Models/PlanEstudio.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanEstudio extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrera_id',
        'semestre',
        'materia',
        'horas_semanales',
    ];

    /**
     * Relación Inversa (Muchos a Uno): Un PlanEstudio pertenece a una Carrera.
     */
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}