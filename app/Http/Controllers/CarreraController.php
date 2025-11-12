<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarreraController extends Controller
{
    /**
     * Mostrar el listado público de carreras.
     */
    public function index()
    {
        $carreras = Carrera::with('nivel')->get();
        return view('carreras.index', compact('carreras'));
    }

    /**
     * Mostrar los detalles públicos de una carrera específica.
     */
    public function show(Carrera $carrera)
    {
        // Cargar relaciones necesarias
        $carrera->load('nivel', 'requisitos');

        // Decodificar los convenios (múltiples PDFs)
        $convenios = $carrera->convenio ? json_decode($carrera->convenio, true) : [];

        // Retornar la vista pública
        return view('carreras.show', [
            'carrera' => $carrera,
            'convenios' => $convenios,
        ]);
    }
}
