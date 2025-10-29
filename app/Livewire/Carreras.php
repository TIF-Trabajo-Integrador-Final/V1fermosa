<?php
namespace App\Livewire;
use App\Models\Carrera;
use Livewire\Component;

class Carreras extends Component
{
    public $carreras;

    public function mount()
    {
        $this->carreras = Carrera::orderBy('nivel')->get(); // Lógica de lectura
    }

    public function render()
    {
        return view('livewire.carreras')
            ->layout('components.layouts.app', ['title' => 'Oferta Académica']);
    }
}
