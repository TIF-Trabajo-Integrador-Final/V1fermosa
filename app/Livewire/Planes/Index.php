<?php

namespace App\Livewire\Planes;

use Livewire\Component;
use App\Models\Carrera; // ¡Importa el modelo que almacena los datos de la carrera/planes!

class Index extends Component
{
    public function render()
    {
        // 1. Obtener la colección de todas las carreras/planes
        // Si tu modelo se llama 'PlanEstudio', usa: PlanEstudio::all();
        $carreras = Carrera::all(); 

        // 2. Pasar la variable 'carreras' a la vista
        return view('livewire.planes.index', [
            'carreras' => $carreras, // La clave 'carreras' es la variable que la vista espera
        ]);
    }
}
