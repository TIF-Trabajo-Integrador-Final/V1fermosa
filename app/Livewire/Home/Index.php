<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Index extends Component
{
    protected $layout = 'components.layouts.app';

    public function render()
    {
        return view('livewire.home.index');
    }
}
