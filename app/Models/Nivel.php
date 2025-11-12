<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $table = 'niveles';
    protected $fillable = ['nombre'];

    // 🔹 Relación Nivel → Carreras (se mantiene)
    public function carreras()
    {
        return $this->hasMany(Carrera::class, 'nivel_id');
    }
}
