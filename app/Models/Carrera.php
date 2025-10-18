<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 
        'slug', 
        'descripcion_corta', 
        'descripcion_larga', 
        'duracion', 
        'titulo_otorgado'
    ];

    /**
     * Relación Uno a Muchos: Una Carrera tiene muchos Planes de Estudio.
     */
    public function planesDeEstudio()
    {
        return $this->hasMany(PlanEstudio::class);
    }

    /**
     * Relación Uno a Muchos: Una Carrera tiene muchas Ofertas Educativas.
     */
    public function ofertas()
    {
        return $this->hasMany(OfertaEducativa::class);
    }
    
    /**
     * Obtiene la ruta clave (route key) para el modelo.
     * Esto permite usar el 'slug' en lugar del 'id' en las rutas.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}