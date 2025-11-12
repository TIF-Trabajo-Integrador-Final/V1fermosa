<?php

namespace App\Livewire;

use App\Models\Carrera;
use Livewire\Component;

class Carreras extends Component
{
    public $carreras;

    public function mount()
    {
        // Cargar carreras con sus niveles y requisitos
        // CORREGIDO: Usamos ['nivel', 'requisitos'] ya que 'requisitos' es una relación directa de Carrera.
        $this->carreras = Carrera::with(['nivel', 'requisitos'])
            ->get()
            ->sortBy(fn($c) => $c->nivel->nombre ?? '');
    }

    public function render()
    {
        return view('livewire.carreras', [
            'carreras' => $this->carreras
        ])->layout('components.layouts.app', [
            'title' => 'Carreras'
        ]);
    }
}
