<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    // Muestra la página de inicio
    public function index()
    {
        return view('home');
    }

    public function institucion()
    {
    
        return view('institucion');
    }
}