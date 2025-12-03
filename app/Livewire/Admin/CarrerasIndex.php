<?php

namespace App\Livewire\Admin;

use App\Models\Carrera;
use App\Models\Nivel;
use App\Models\Requisito;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CarrerasIndex extends Component
{
    use WithFileUploads;

    public $carreras;
    public $niveles;
    public $requisitos;

    // Campos del formulario
    public $carrera_id;
    public $nombre;
    public $nivel_id;
    public $modalidad;
    public $descripcion;
    public $perfilProfesional; // CAMBIO: este campo mapea a perfil_profesional
    public $duracion_meses;
    public $imagen;
    public $oldImagen;
    public $requisitosSeleccionados = [];

    public $isFormVisible = false;

    /**
     * REGIONAL: Reglas de validación corregidas
     */
    protected function rules()
    {
        return [
            'nombre' => [
                'required',
                'string',
                'max:150',
                Rule::unique('carreras', 'nombre')->ignore($this->carrera_id), // CAMBIO
            ],
            'nivel_id' => 'required|exists:niveles,id', // CAMBIO
            'modalidad' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'perfilProfesional' => 'nullable|string', // CAMBIO para mapear correctamente
            'duracion_meses' => 'required|integer|min:1|max:72',
            'imagen' => 'nullable|image|max:6550',
            'requisitosSeleccionados' => 'array', // CAMBIO
            'requisitosSeleccionados.*' => 'exists:requisitos,id',
        ];
    }

    public function mount()
    {
        $this->cargarDatos();
    }

    private function cargarDatos()
    {
        $this->carreras = Carrera::with(['nivel', 'requisitos'])->get();
        $this->niveles = Nivel::all();
        $this->requisitos = Requisito::all();
    }

    public function render()
    {
        return view('livewire.admin.carreras-index')
            ->layout('components.layouts.admin', [
                'title' => 'Panel Administrativo - Instituto Superior Fermosa'
            ]);
    }

    public function mostrarFormulario($id = null)
    {
        $this->resetFormulario(); // CAMBIO: limpiamos todo

        if ($id) {
            $carrera = Carrera::find($id);

            if (!$carrera) return;

            $this->carrera_id = $carrera->id;
            $this->nombre = $carrera->nombre;
            $this->nivel_id = $carrera->nivel_id;
            $this->modalidad = $carrera->modalidad;
            $this->descripcion = $carrera->descripcion;
            $this->perfilProfesional = $carrera->perfil_profesional; // CAMBIO
            $this->duracion_meses = $carrera->duracion_meses;
            $this->oldImagen = $carrera->imagen;
            $this->requisitosSeleccionados = $carrera->requisitos->pluck('id')->toArray();
        }

        $this->isFormVisible = true;
    }

    public function guardar()
    {
        $this->validate();

        // CAMBIO: Mapeo correcto BD <-> Livewire
        $data = [
            'nombre' => $this->nombre,
            'nivel_id' => (int)$this->nivel_id,
            'modalidad' => $this->modalidad,
            'descripcion' => $this->descripcion,
            'perfil_profesional' => $this->perfilProfesional, // CAMBIO
            'duracion_meses' => (int)$this->duracion_meses,
        ];

        // Procesar imagen
        if ($this->imagen) {
            if ($this->oldImagen && Storage::disk('public')->exists($this->oldImagen)) {
                Storage::disk('public')->delete($this->oldImagen); // CAMBIO
            }

            $ruta = $this->imagen->store('carreras', 'public'); // CAMBIO
            $data['imagen'] = $ruta;
        }

        // Guardar o actualizar
        $carrera = Carrera::updateOrCreate(['id' => $this->carrera_id], $data);

        // Sincronizar requisitos
        $carrera->requisitos()->sync($this->requisitosSeleccionados);

        // Recargar datos
        $this->cargarDatos();
        $this->resetFormulario();

        session()->flash('ok', 'Carrera guardada correctamente.');
    }

    public function eliminar($id)
    {
        $carrera = Carrera::find($id);
        if (!$carrera) return;

        if ($carrera->imagen && Storage::disk('public')->exists($carrera->imagen)) {
            Storage::disk('public')->delete($carrera->imagen); // CAMBIO
        }

        $carrera->delete();

        $this->cargarDatos();

        session()->flash('ok', 'Carrera eliminada.');
    }
    protected $listeners = ['eliminar' => 'eliminar'];


    public function resetFormulario()
    {
        $this->reset([
            'carrera_id',
            'nombre',
            'nivel_id',
            'modalidad',
            'descripcion',
            'perfilProfesional',
            'duracion_meses',
            'imagen',
            'oldImagen',
            'requisitosSeleccionados',
            'isFormVisible'
        ]);

        $this->resetValidation();
    }
}
