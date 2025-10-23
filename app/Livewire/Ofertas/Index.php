<?php

namespace App\Livewire\Ofertas;

use Livewire\Component;
use App\Models\Oferta; // Importa el modelo (ajusta el nombre si es diferente)

class Index extends Component
{
    public function render()
    {
        // 1. Obtener la colección de todas las ofertas desde la BD
        // Si el modelo se llama OfertaEducativa, usa: OfertaEducativa::all();
        $ofertas = Oferta::all(); 

        // 2. Pasar la variable 'ofertas' a la vista
        return view('livewire.ofertas.index', [
            'ofertas' => $ofertas,
        ]);
    }
}