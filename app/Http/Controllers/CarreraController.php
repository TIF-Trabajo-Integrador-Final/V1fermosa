<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    // Muestra el listado de todas las carreras (Oferta Educativa)
    public function index()
    {
        // Obtiene todas las carreras
        $carreras = Carrera::all();
        
        return view('carreras.index', compact('carreras'));
    }

    // Muestra el detalle de una carrera específica
    public function show(Carrera $carrera)
    {
        // Carga las relaciones (planes de estudio y ofertas) para evitar N+1
        $carrera->load('planesDeEstudio', 'ofertas');
        
        return view('carreras.show', compact('carrera'));
    }
}