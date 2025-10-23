<?php

namespace App\Livewire\Planes;

use Livewire\Component;

class Form extends Component
{
    public $carrera_id;
    public $nombre;
    public $duracion;
    public $descripcion;

    public function render()
    {
        return view('livewire.planes.form');
    }
}
