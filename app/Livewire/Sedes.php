<?php
namespace App\Livewire;
use App\Models\Sede;
use Livewire\Component;

class Sedes extends Component
{
    public $sedes;

    public function mount()
    {
        $this->sedes = Sede::all();
    }
    
    public function render()
    {
        return view('livewire.sedes')
            ->layout('components.layouts.app', ['title' => 'Sedes']);
    }
}