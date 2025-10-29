<?php
namespace App\Livewire;
use App\Models\Requisito;
use Livewire\Component;

class Requisitos extends Component
{
    public $requisitos;

    public function mount()
    {
        $this->requisitos = Requisito::all();
    }
    
    public function render()
    {
        return view('livewire.requisitos')
            ->layout('components.layouts.app', ['title' => 'Requisitos']);
    }
}