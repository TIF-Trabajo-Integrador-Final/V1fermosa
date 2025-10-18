<?php
// app/Models/OfertaEducativa.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaEducativa extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrera_id',
        'tipo',
        'requisitos',
    ];

    /**
     * Relación Inversa (Muchos a Uno): Una OfertaEducativa pertenece a una Carrera.
     */
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}