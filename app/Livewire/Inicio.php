<?php

namespace App\Livewire;

use Livewire\Component;

class Inicio extends Component
{
    public function render()
    {
        return view('livewire.inicio')
            ->layout('components.layouts.app', ['title' => 'Inicio - Instituto Superior Fermosa']);
    }
}
