<?php

namespace App\Livewire\Admin;

use App\Models\Carrera;
use App\Models\Nivel;
use App\Models\Requisito;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class CarrerasIndex extends BaseAdminComponent
{
    use WithFileUploads;

    // Propiedades del modelo
    public $isFormVisible = false;
    public $carreraId;
    public $nombre, $nivel_id, $descripcion, $perfilProfesional;
    public $duracion_meses = 1;

    // Archivos
    public $convenios = [];     // nuevos PDFs
    public $oldConvenios = [];  // PDFs existentes
    public $imagen;             // nueva imagen
    public $oldImagen;          // imagen existente

    // Filtros
    public $search = '';
    public $sortField = 'nombre';
    public $sortDirection = 'asc';

    // Relaciones
    public $niveles = [];
    public $todosRequisitos = [];
    public $requisitosSeleccionados = [];

    // Reglas de validación
    protected $rules = [
        'nombre' => 'required|string|max:150|unique:carreras,nombre',
        'nivel_id' => 'required|integer|exists:niveles,id',
        'descripcion' => 'required|string',
        'perfilProfesional' => 'nullable|string',
        'duracion_meses' => 'required|integer|min:1',
        'convenios.*' => 'nullable|file|mimes:pdf|max:10240',
        'imagen' => 'nullable|image|max:5120',
        'requisitosSeleccionados' => 'array',
        'requisitosSeleccionados.*' => 'integer|exists:requisitos,id',
    ];

    protected $messages = [
        'convenios.*.mimes' => 'Cada archivo debe ser de tipo PDF.',
        'convenios.*.max' => 'El tamaño máximo permitido para cada PDF es de 10MB.',
        'imagen.image' => 'El archivo debe ser una imagen.',
        'imagen.max' => 'La imagen no puede superar los 5MB.',
        'nombre.unique' => 'Ya existe una carrera con ese nombre.',
        'nivel_id.required' => 'Debe seleccionar un nivel.',
        'nivel_id.exists' => 'El nivel seleccionado no es válido.',
        'requisitosSeleccionados.*.exists' => 'Uno o más requisitos seleccionados no son válidos.',
    ];

    public function mount()
    {
        $this->niveles = Nivel::all();
        $this->todosRequisitos = Requisito::orderBy('descripcion')->get();
    }

    public function render()
    {
        $carreras = Carrera::query()
            ->when(
                $this->search,
                fn($q) =>
                $q->where('nombre', 'like', "%{$this->search}%")
                    ->orWhereHas(
                        'nivel',
                        fn($n) =>
                        $n->where('nombre', 'like', "%{$this->search}%")
                    )
            )
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.admin.carreras-index', [
            'carreras' => $carreras,
        ])->layout('layouts.admin', [
            'title' => 'Gestión de Carreras',
        ]);
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    // Crear
    public function crear()
    {
        $this->reset([
            'carreraId',
            'nombre',
            'nivel_id',
            'descripcion',
            'perfilProfesional',
            'duracion_meses',
            'convenios',
            'oldConvenios',
            'imagen',
            'oldImagen',
            'requisitosSeleccionados'
        ]);
        $this->isFormVisible = true;
        $this->resetValidation();
    }

    // Editar
    public function editar($id)
    {
        $carrera = Carrera::with('requisitos')->findOrFail($id);

        $this->carreraId = $carrera->id;
        $this->nombre = $carrera->nombre;
        $this->nivel_id = $carrera->nivel_id;
        $this->descripcion = $carrera->descripcion;
        $this->perfilProfesional = $carrera->perfil_profesional;
        $this->duracion_meses = $carrera->duracion_meses ?? 1;
        $this->oldConvenios = $carrera->convenio ? json_decode($carrera->convenio, true) : [];
        $this->convenios = [];
        $this->oldImagen = $carrera->imagen;
        $this->imagen = null;
        $this->requisitosSeleccionados = $carrera->requisitos->pluck('id')->all();

        $this->isFormVisible = true;
        $this->resetValidation();
    }

    // Guardar / actualizar
    public function guardar()
    {
        try {
            $rules = $this->rules;
            if ($this->carreraId) {
                $rules['nombre'] = [
                    'required',
                    'string',
                    'max:150',
                    Rule::unique('carreras', 'nombre')->ignore($this->carreraId),
                ];
            }
            $this->validate($rules);

            $data = [
                'nombre' => $this->nombre,
                'nivel_id' => $this->nivel_id,
                'descripcion' => $this->descripcion,
                'perfil_profesional' => $this->perfilProfesional,
                'duracion_meses' => $this->duracion_meses,
            ];

            // PDFs
            $pdfPaths = $this->oldConvenios ?? [];
            if (!empty($this->convenios)) {
                foreach ($this->convenios as $file) {
                    $pdfPaths[] = $file->store('pdfs', 'public');
                }
            }
            $data['convenio'] = json_encode($pdfPaths);

            // Imagen
            if ($this->imagen) {
                if ($this->oldImagen && Storage::disk('public')->exists($this->oldImagen)) {
                    Storage::disk('public')->delete($this->oldImagen);
                }
                $data['imagen'] = $this->imagen->store('imagenes', 'public');
            } else {
                $data['imagen'] = $this->oldImagen ?? null;
            }

            $carrera = $this->carreraId
                ? tap(Carrera::findOrFail($this->carreraId))->update($data)
                : Carrera::create($data);

            $carrera->requisitos()->sync($this->requisitosSeleccionados ?? []);

            session()->flash('success', $this->carreraId ? 'Carrera actualizada con éxito.' : 'Carrera creada con éxito.');
            $this->cerrarFormulario();
        } catch (\Exception $e) {
            Log::error('Error al guardar carrera: ' . $e->getMessage());
            session()->flash('error', 'Error al guardar carrera: ' . $e->getMessage());
        }
    }

    // Eliminar carrera y sus archivos
    public function eliminar($id)
    {
        $carrera = Carrera::findOrFail($id);
        try {
            if ($carrera->convenio) {
                foreach (json_decode($carrera->convenio, true) ?? [] as $pdf) {
                    Storage::disk('public')->delete($pdf);
                }
            }
            if ($carrera->imagen && Storage::disk('public')->exists($carrera->imagen)) {
                Storage::disk('public')->delete($carrera->imagen);
            }
            $carrera->delete();
            session()->flash('success', 'Carrera eliminada correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar carrera: ' . $e->getMessage());
            session()->flash('error', 'Error al eliminar carrera: ' . $e->getMessage());
        }
    }

    // Eliminar PDF individual
    public function eliminarPdf($index)
    {
        $carrera = Carrera::findOrFail($this->carreraId);
        $pdfs = $carrera->convenio ? json_decode($carrera->convenio, true) : [];

        if (!isset($pdfs[$index])) {
            session()->flash('error', 'Archivo no existe.');
            return;
        }

        Storage::disk('public')->delete($pdfs[$index]);
        unset($pdfs[$index]);
        $pdfs = array_values($pdfs);

        $carrera->convenio = json_encode($pdfs);
        $carrera->save();

        $this->oldConvenios = $pdfs;
        session()->flash('success', 'PDF eliminado correctamente.');
    }

    public function cerrarFormulario()
    {
        $this->reset([
            'carreraId',
            'nombre',
            'nivel_id',
            'descripcion',
            'perfilProfesional',
            'duracion_meses',
            'convenios',
            'oldConvenios',
            'imagen',
            'oldImagen',
            'isFormVisible',
            'requisitosSeleccionados'
        ]);
        $this->resetValidation();
    }
}
