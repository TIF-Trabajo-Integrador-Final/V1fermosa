<?php

namespace App\Livewire\Admin;

use App\Models\Carrera;
use Livewire\Component;

class CarrerasIndex extends Component
{
    // Datos del modelo
    public $carreraId;
    public $nombre, $nivel, $descripcion, $arancel_matricula, $arancel_mensual;
    
    // Estado de la UI
    public $mostrarFormulario = false;

    // Método principal para renderizar la vista y cargar datos
    public function render()
    {
        $carreras = Carrera::all();
        return view('livewire.admin.carreras-index', compact('carreras'))
            // Usa el layout de Breeze para el área protegida
            ->layout('layouts.app', ['header' => 'Gestión de Carreras']); 
    }

    // Abre el formulario en modo de creación
    public function crear()
    {
        $this->reset(); // Limpia todas las propiedades (formato Livewire)
        $this->mostrarFormulario = true;
    }
    
    // Carga los datos de una carrera para edición
    public function editar($id)
    {
        $carrera = Carrera::findOrFail($id);
        $this->carreraId = $carrera->id;
        $this->nombre = $carrera->nombre;
        $this->nivel = $carrera->nivel;
        $this->descripcion = $carrera->descripcion;
        $this->arancel_matricula = $carrera->arancel_matricula;
        $this->arancel_mensual = $carrera->arancel_mensual;
        
        $this->mostrarFormulario = true;
    }

    // Guarda o actualiza la carrera (Create/Update)
    public function guardar()
    {
        $this->validate([
            'nombre' => 'required|string|max:150',
            'nivel' => 'required|string|max:50',
            'descripcion' => 'required|string',
            'arancel_matricula' => 'required|numeric|min:0',
            'arancel_mensual' => 'required|numeric|min:0',
        ]);
        
        $datos = $this->only(['nombre', 'nivel', 'descripcion', 'arancel_matricula', 'arancel_mensual']);

        if ($this->carreraId) {
            Carrera::find($this->carreraId)->update($datos);
            session()->flash('message', '✅ Carrera actualizada con éxito.');
        } else {
            Carrera::create($datos);
            session()->flash('message', '✅ Carrera creada con éxito.');
        }

        $this->mostrarFormulario = false;
        $this->reset(); // Limpia el formulario después de guardar
    }
    
    // Elimina la carrera
    public function eliminar($id)
    {
        Carrera::destroy($id);
        session()->flash('message', '🗑️ Carrera eliminada.');
    }
}