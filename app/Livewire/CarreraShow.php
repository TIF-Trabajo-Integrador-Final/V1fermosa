<?php

namespace App\Livewire;

use App\Models\Carrera;
use Livewire\Component;

class CarreraShow extends Component
{
    public $carrera;

    public function mount(int $id)
    {
        $this->carrera = Carrera::with(['nivel', 'requisitos'])->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.carrera-show')
            ->layout('components.layouts.app', [
                'title'        => $this->carrera->nombre,
                'menuCarreras' => Carrera::orderBy('nombre')->get(),
            ]);
    }
}