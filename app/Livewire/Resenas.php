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
        'mensaje' => 'required|max:10000',
    ];

    public function enviar()
    {
        $this->validate();

        // Crear la reseña
        Resena::create([
            'nombre'  => $this->nombre,
            'email'   => $this->email,
            'mensaje' => $this->mensaje,
        ]);

        // Resetear campos
        $this->reset(['nombre','email','mensaje']);

        // Mostrar mensaje de éxito
        session()->flash('ok', 'Gracias por tu reseña.');
    }

    public function render()
    {
        // Obtener todas las reseñas
        return view('livewire.resenas', [
            'lista' => Resena::orderBy('created_at', 'DESC')->get(),
        ]);
    }
}
