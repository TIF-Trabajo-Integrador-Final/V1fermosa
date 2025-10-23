<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represent the component.
     * * Este componente es usado por Laravel Breeze/Auth para envolver 
     * las vistas de Login, Register y Password Reset.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        // Esta línea indica a Laravel que use la plantilla
        // que se encuentra en resources/views/layouts/guest.blade.php
        return view('layouts.guest');
    }
}