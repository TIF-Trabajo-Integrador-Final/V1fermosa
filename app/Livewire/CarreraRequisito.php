<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Requisito;
use App\Models\Carrera;

class CarreraRequisito extends Component
{
    public $carrera;
    public $requisitos = [];
    public $show = false;

    protected $listeners = ['toggleRequisitos'];

    public function mount(Carrera $carrera)
    {
        $this->carrera = $carrera;
    }

    public function toggleRequisitos()
    {
        $this->show = !$this->show;

        if ($this->show) {
            // Cargar los requisitos directamente relacionados con la carrera
            $this->requisitos = $this->carrera->requisitos ?? collect();
        }
    }


    public function render()
    {
        return view('livewire.carrera-requisitos');
    }
}
