<?php

namespace App\Livewire\Requisitos;

use Livewire\Component;
use App\Models\Requisito; // Asegúrate de tener el modelo correcto aquí

class Index extends Component
{
    public function render()
    {
        // 1. Obtener todos los requisitos
        $requisitos = Requisito::all(); 

        // 2. Pasar la colección a la vista
        return view('livewire.requisitos.index', [
            'requisitos' => $requisitos,
        ]);
    }
}