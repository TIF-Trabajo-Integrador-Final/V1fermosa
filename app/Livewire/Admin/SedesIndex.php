<?php

namespace App\Livewire\Admin;

use App\Models\Sede;
use Livewire\Component;

class SedesIndex extends Component
{
    // Datos del modelo
    public $sedeId;
    public $nombre, $ubicacion, $direccion, $latitud, $longitud;
    
    // Estado de la UI
    public $mostrarFormulario = false;

    public function render()
    {
        $sedes = Sede::all();
        return view('livewire.admin.sedes-index', compact('sedes'))
            ->layout('layouts.app', ['header' => 'Gestión de Sedes']);
    }

    public function crear()
    {
        $this->reset(); 
        $this->mostrarFormulario = true;
    }
    
    public function editar($id)
    {
        $sede = Sede::findOrFail($id);
        $this->sedeId = $sede->id;
        $this->nombre = $sede->nombre;
        $this->ubicacion = $sede->ubicacion;
        $this->direccion = $sede->direccion;
        $this->latitud = $sede->latitud;
        $this->longitud = $sede->longitud;
        
        $this->mostrarFormulario = true;
    }

    public function guardar()
    {
        $this->validate([
            'nombre' => 'required|string|max:100',
            'ubicacion' => 'required|string',
            'direccion' => 'required|string',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
        ]);
        
        $datos = $this->only(['nombre', 'ubicacion', 'direccion', 'latitud', 'longitud']);

        if ($this->sedeId) {
            Sede::find($this->sedeId)->update($datos);
            session()->flash('message', '✅ Sede actualizada con éxito.');
        } else {
            Sede::create($datos);
            session()->flash('message', '✅ Sede creada con éxito.');
        }

        $this->mostrarFormulario = false;
        $this->reset(); 
    }
    
    public function eliminar($id)
    {
        Sede::destroy($id);
        session()->flash('message', '🗑️ Sede eliminada.');
    }
}