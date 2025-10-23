<?php

namespace App\Livewire\Sedes;

use Livewire\Component;
use App\Models\Sede; // Asegúrate de que esta línea esté presente

class Index extends Component
{
    public function render()
    {
        // 1. Obtener la colección de todas las sedes desde la BD
        $sedes = Sede::all(); 

        // 2. Pasar la variable 'sedes' a la vista
        return view('livewire.sedes.index', [
            'sedes' => $sedes,
        ]);
    }
}