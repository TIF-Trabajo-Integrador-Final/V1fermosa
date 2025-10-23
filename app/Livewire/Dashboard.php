<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    /**
     * Título de la página que se mostrará en el layout principal.
     */
    public $pageTitle = 'Panel de Administración';

    /**
     * Renderiza la vista del componente Livewire.
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        // Esta vista DEBE existir: resources/views/livewire/dashboard.blade.php
        return view('livewire.dashboard')
            // Asume que usas el layout 'layouts.app' provisto por Laravel Breeze/Jetstream
            ->layout('layouts.app', ['header' => $this->pageTitle]); 
    }
}
