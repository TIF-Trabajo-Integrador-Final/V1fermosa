<?php

namespace App\Livewire;

use App\Models\Carrera;
use Livewire\Component;

class Carreras extends Component
{
    public $carreras;
    public $menuCarreras;

    public function mount()
    {
        $this->carreras = Carrera::with('nivel')->orderBy ('nivel_id')->get();

        // 🔥 ESTO ALIMENTA TU DROPDOWN DEL LAYOUT
        $this->menuCarreras = Carrera::orderBy('nombre')->get();
    }

    public function render()
    {
        return view('livewire.carreras')
            ->layout('components.layouts.app', [
                'title'        => 'Oferta Académica',
                'menuCarreras' => $this->menuCarreras, // 🔥 AQUÍ SE ENVÍA AL LAYOUT
            ]);
    }
}
