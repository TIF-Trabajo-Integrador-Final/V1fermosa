<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Carrera;

class MostrarRequisitos extends Component
{
    public $carrera;
    public $mostrarRequisitos = false;

    // Permitir recibir la carrera desde el controlador
    public function mount(Carrera $carrera)
    {
        $this->carrera = $carrera;
    }

    public function render()
    {
        return view('livewire.mostrar-requisitos');
    }
    public function toggleRequisitos()
    {
        $this->mostrarRequisitos = !$this->mostrarRequisitos;
    }
}
