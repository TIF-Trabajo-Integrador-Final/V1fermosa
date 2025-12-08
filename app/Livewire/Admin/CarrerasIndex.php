<?php

namespace App\Livewire\Admin;

use App\Models\Carrera;
use App\Models\Nivel;
use App\Models\Requisito;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class CarrerasIndex extends Component
{
    use WithFileUploads;

    public $carreras;
    public $niveles;
    public $requisitos;

    // Form fields
    public $carrera_id;
    public $nombre;
    public $nivel_id;
    public $modalidad;
    public $descripcion;
    public $perfilProfesional;
    public $duracion_meses;
    public $imagen;
    public $oldImagen;
    public $requisitosSeleccionados = [];

    public $isFormVisible = false;

    protected function rules()
    {
        return [
            'nombre' => [
                'required', 'string', 'max:150',
                Rule::unique('carreras', 'nombre')->ignore($this->carrera_id),
            ],
            'nivel_id' => 'required|exists:niveles,id',
            'modalidad' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'perfilProfesional' => 'nullable|string',
            'duracion_meses' => 'required|integer|min:1|max:72',
            'imagen' => 'nullable|image|max:6550',
            'requisitosSeleccionados' => 'array',
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
        $this->resetFormulario();

        if ($id) {
            $carrera = Carrera::findOrFail($id);

            $this->carrera_id = $carrera->id;
            $this->nombre = $carrera->nombre;
            $this->nivel_id = $carrera->nivel_id;
            $this->modalidad = $carrera->modalidad;
            $this->descripcion = $carrera->descripcion;
            $this->perfilProfesional = $carrera->perfil_profesional;
            $this->duracion_meses = $carrera->duracion_meses;
            $this->oldImagen = $carrera->imagen;
            $this->requisitosSeleccionados = $carrera->requisitos->pluck('id')->toArray();
        }

        $this->isFormVisible = true;
    }

    public function guardar()
    {
        $this->validate();

        $data = [
            'nombre' => $this->nombre,
            'nivel_id' => (int)$this->nivel_id,
            'modalidad' => $this->modalidad,
            'descripcion' => $this->descripcion,
            'perfil_profesional' => $this->perfilProfesional,
            'duracion_meses' => (int)$this->duracion_meses,
        ];

        // ====================================
        // MANEJO DE IMÁGENES CORRECTO
        // ====================================
        if ($this->imagen) {

            // Eliminar imagen anterior
            if ($this->oldImagen && File::exists(public_path($this->oldImagen))) {
                File::delete(public_path($this->oldImagen));
            }

            $filename = uniqid() . '.' . $this->imagen->getClientOriginalExtension();

            // Crear carpeta si no existe
            $destination = public_path('images/carreras');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            // Guardar archivo real
            $this->imagen->storeAs('images/carreras', $filename, 'public_path');

            // Ruta que se guarda en BD
            $data['imagen'] = 'images/carreras/' . $filename;
        }

        // Crear o actualizar carrera
        $carrera = Carrera::updateOrCreate(
            ['id' => $this->carrera_id],
            $data
        );

        $carrera->requisitos()->sync($this->requisitosSeleccionados);

        $this->cargarDatos();
        $this->resetFormulario();

        session()->flash('ok', 'Carrera guardada correctamente.');
    }

    public function eliminar($id)
    {
        $carrera = Carrera::findOrFail($id);

        if ($carrera->imagen && File::exists(public_path($carrera->imagen))) {
            File::delete(public_path($carrera->imagen));
        }

        $carrera->delete();

        $this->cargarDatos();
        session()->flash('ok', 'Carrera eliminada.');
    }

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
            'isFormVisible',
        ]);

        $this->resetValidation();
    }
}
