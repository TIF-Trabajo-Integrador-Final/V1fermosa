<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Carrera;

class Inicio extends Component
{
    public function render()
    {
        // 🔹 Cargamos las carreras para el menú desplegable superior
        $menuCarreras = Carrera::orderBy('nombre')->get();

        // 🔹 Renderizamos la vista con el layout público correcto
        return view('livewire.inicio', compact('menuCarreras'))
            ->layout('components.layouts.app', [
                'title' => 'Inicio - Instituto Superior Fermosa'
            ]);
    }
}
