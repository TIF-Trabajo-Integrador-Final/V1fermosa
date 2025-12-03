<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Convenio;

class ShowConvenios extends Component
{
    public $convenios;

    public function mount()
    {
        // Cargar todos los convenios
        $this->convenios = Convenio::all();
    }

    public function render()
    {
        return view('livewire.show-convenios');
    }
}
