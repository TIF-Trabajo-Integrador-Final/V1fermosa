<?php

namespace App\Livewire\Carreras;

use Livewire\Component;
use App\Models\Carrera;

class Index extends Component
{
    public $carreras;

    public function mount()
    {
        // Obtenemos todas las carreras (terciarias, posgrados, etc)
        $this->carreras = Carrera::all();
    }

    public function render()
    {
        return view('livewire.carreras.index')
            ->layout('components.layouts.app');
    }
}
