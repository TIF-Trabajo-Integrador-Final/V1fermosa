<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion'];


    // 🔹 Relación muchos a muchos con carreras
    public function carreras()
    {
        return $this->belongsToMany(Carrera::class, 'carrera_requisito', 'requisito_id', 'carrera_id');
    }
}
