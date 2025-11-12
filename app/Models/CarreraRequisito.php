<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarreraRequisito extends Model
{
    use HasFactory;

    protected $table = 'carrera_requisito';

    protected $fillable = [
        'carrera_id',
        'requisito_id',
    ];

    public $timestamps = false; // 👈 si tu tabla pivote no tiene columnas created_at / updated_at

    // Relaciones opcionales (no obligatorias, pero útiles)
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }

    public function requisito()
    {
        return $this->belongsTo(Requisito::class, 'requisito_id');
    }
}
