<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'carreras';

    protected $fillable = [
        'nombre',
        'nivel_id',
        'descripcion',
        'perfil_profesional',
        'duracion_meses',
        'convenio',
        'imagen'
    ];

    // 🔹 Relación: cada carrera pertenece a un nivel
    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'nivel_id');
    }

    // 🔹 Relación muchos a muchos con requisitos
    public function requisitos()
    {
        return $this->belongsToMany(Requisito::class, 'carrera_requisito', 'carrera_id', 'requisito_id');
    }
}
