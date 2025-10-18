<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudInscripcion extends Model
{
    use HasFactory;
    
    // Nombre de la tabla asociada al modelo
    protected $table = 'solicitudes_inscripcion';

    // Campos que se pueden asignar masivamente (Mass Assignment Protection)
    protected $fillable = [
        'nombre_completo',
        'email',
        'telefono',
        'carrera_interes',
        'mensaje',
        'procesado',
    ];

    public $timestamps = true;
}

