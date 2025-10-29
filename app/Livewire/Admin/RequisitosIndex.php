<?php

namespace App\Livewire\Admin;

use App\Models\Requisito;
use Livewire\Component;

class RequisitosIndex extends Component
{
    // Datos del modelo
    public $requisitoId;
    public $titulo, $detalle;
    
    // Estado de la UI
    public $mostrarFormulario = false;

    public function render()
    {
        $requisitos = Requisito::all();
        return view('livewire.admin.requisitos-index', compact('requisitos'))
            ->layout('layouts.app', ['header' => 'Gestión de Requisitos']);
    }

    public function crear()
    {
        $this->reset(); 
        $this->mostrarFormulario = true;
    }
    
    public function editar($id)
    {
        $requisito = Requisito::findOrFail($id);
        $this->requisitoId = $requisito->id;
        $this->titulo = $requisito->titulo;
        $this->detalle = $requisito->detalle;
        
        $this->mostrarFormulario = true;
    }

    public function guardar()
    {
        $this->validate([
            'titulo' => 'required|string|max:255',
            'detalle' => 'required|string',
        ]);
        
        $datos = $this->only(['titulo', 'detalle']);

        if ($this->requisitoId) {
            Requisito::find($this->requisitoId)->update($datos);
            session()->flash('message', '✅ Requisito actualizado con éxito.');
        } else {
            Requisito::create($datos);
            session()->flash('message', '✅ Requisito creado con éxito.');
        }

        $this->mostrarFormulario = false;
        $this->reset(); 
    }
    
    public function eliminar($id)
    {
        Requisito::destroy($id);
        session()->flash('message', '🗑️ Requisito eliminado.');
    }
}