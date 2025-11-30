<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Resena;

class Resenas extends Component
{
    public $nombre;
    public $email;
    public $mensaje;

    protected $rules = [
        'nombre' => 'required|max:50',
        'email'  => 'nullable|email',
        'mensaje' => 'required|max:250',
    ];

    public function enviar()
    {
        $this->validate();

        Resena::create([
            'nombre'  => $this->nombre,
            'email'   => $this->email,
            'mensaje' => $this->mensaje,
        ]);

        $this->reset(['nombre','email','mensaje']);

        session()->flash('ok', 'Gracias por tu reseña.');
    }

    public function render()
    {
        return view('livewire.resenas', [
            'lista' => Resena::orderBy('created_at', 'DESC')->get(),
        ]);
    }
}
