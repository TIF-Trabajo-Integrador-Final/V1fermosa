<?php

namespace App\Http\Controllers;

use App\Models\Convenio;
use Illuminate\Http\Request;

class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todos los convenios, ordenados por fecha de inicio descendente
        $convenios = Convenio::orderBy('fecha_inicio', 'desc')->paginate(10);
        
        // Retorna la vista 'convenios.index' y le pasa los datos
        return view('convenios.index', compact('convenios'));
    }

    // Los métodos 'create', 'store', 'show', 'edit', 'update', 'destroy'
    // se generan automáticamente con la opción --resource y se implementan
    // según las necesidades CRUD.
}