<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    // Muestra el listado de sedes
    public function index()
    {
        // Obtiene todas las sedes de la base de datos
        $sedes = Sede::all();
        
        return view('sedes.index', compact('sedes'));
    }
}