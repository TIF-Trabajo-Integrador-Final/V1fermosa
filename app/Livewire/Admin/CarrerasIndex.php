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

    // Campos del formulario
    public $carrera_id;
    public $nombre;
    public $nivel_id;
    public $modalidad;
    public $descripcion;
    public $perfilProfesional;
    public $duracion_meses;
    public $imagen;        // archivo cargado
    public $oldImagen;     // ruta existente en BD
    public $requisitosSeleccionados = [];

    public $isFormVisible = false;

    /**
     * Validaciones
     */
    protected function rules()
    {
        return [
            'nombre' => [
                'required',
                'string',
                'max:150',
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

    /**
     * Mostrar formulario de creación/edición
     */
    public function mostrarFormulario($id = null)
    {
        $this->resetFormulario();

        if ($id) {
            $carrera = Carrera::find($id);
            if (!$carrera) return;

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

    /**
     * Guardar o actualizar carrera
     */
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

        // ================================================
        //  MANEJO DE IMAGENES - NUEVO SISTEMA
        // ================================================
        if ($this->imagen) {

            // Si hay imagen previa → eliminarla
            if ($this->oldImagen && File::exists(public_path($this->oldImagen))) {
                File::delete(public_path($this->oldImagen));
            }

            // Generar nombre único
            $filename = uniqid() . '.' . $this->imagen->getClientOriginalExtension();

            // Crear directorio si no existe
            $destination = public_path('images/carreras');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            // Guardar imagen real en public/images/carreras
            $this->imagen->storeAs('images/carreras', $filename, 'public_path');

            $data['imagen'] = 'images/carreras/' . $filename;
        }

        // Crear o actualizar
        $carrera = Carrera::updateOrCreate(
            ['id' => $this->carrera_id],
            $data
        );

        // Sincronizar requisitos
        $carrera->requisitos()->sync($this->requisitosSeleccionados);

        $this->cargarDatos();
        $this->resetFormulario();

        session()->flash('ok', 'Carrera guardada correctamente.');
    }

    /**
     * Eliminar carrera
     */
    public function eliminar($id)
    {
        $carrera = Carrera::find($id);
        if (!$carrera) return;

        // Eliminar imagen física
        if ($carrera->imagen && File::exists(public_path($carrera->imagen))) {
            File::delete(public_path($carrera->imagen));
        }

        $carrera->delete();

        $this->cargarDatos();
        session()->flash('ok', 'Carrera eliminada.');
    }

    protected $listeners = ['eliminar' => 'eliminar'];

    /**
     * Resetear formulario
     */
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
