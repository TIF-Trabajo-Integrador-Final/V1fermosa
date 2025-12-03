<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Resena; // Asegúrate de importar el modelo de Resena

class ResenasIndex extends Component
{
  public function render()
{
    // Obtener todas las reseñas para mostrarlas en el admin
    $resenas = Resena::all();

    // Corregir la sintaxis en la llamada a la vista
    return view('livewire.admin.resenas-index', ['resenas' => $resenas])
        ->layout('components.layouts.admin');
}


    public function eliminar($id)
    {
        // Eliminar la reseña correspondiente por ID
        Resena::find($id)->delete();

        // Mensaje de confirmación de eliminación
        session()->flash('ok', 'Reseña eliminada correctamente.');
    }
}
