<?php

namespace App\Livewire\Admin;

use App\Models\Requisito;
use Livewire\Component;

class RequisitosIndex extends BaseAdminComponent
{
    // Propiedades
    public $requisitoId;
    public $titulo;
    public $detalle;

    // Control del formulario
    public $mostrarFormulario = false;

    // Reglas de validación
    protected $rules = [
        'titulo' => 'required|string|max:255',
        'detalle' => 'required|string',
    ];

    protected $messages = [
        'titulo.required' => 'El campo título es obligatorio.',
        'titulo.max' => 'El título no puede superar los 255 caracteres.',
        'detalle.required' => 'Debe ingresar una descripción o detalle.',
    ];

    /**
     * Renderiza la vista principal con layout del panel admin.
     */
    public function render()
    {
        return $this->renderAdmin('livewire.admin.requisitos-index', [
            'requisitos' => Requisito::latest()->get(),
            'title' => 'Gestión de Requisitos de Inscripción',
        ]);
    }

    /**
     * Muestra formulario vacío para crear un nuevo requisito.
     */
    public function crear()
    {
        $this->reset(['requisitoId', 'titulo', 'detalle']);
        $this->mostrarFormulario = true;
        $this->resetValidation();
    }

    /**
     * Carga un requisito existente para editar.
     */
    public function editar($id)
    {
        $requisito = Requisito::findOrFail($id);

        $this->requisitoId = $requisito->id;
        $this->titulo = $requisito->titulo;
        $this->detalle = $requisito->descripcion; // usa el nombre real del campo en BD
        $this->mostrarFormulario = true;

        $this->resetValidation();
    }

    /**
     * Guarda o actualiza un requisito.
     */
    public function guardar()
    {
        $this->validate();

        $data = [
            'titulo' => trim($this->titulo),
            'descripcion' => trim($this->detalle),
        ];

        if ($this->requisitoId) {
            Requisito::findOrFail($this->requisitoId)->update($data);
            session()->flash('success', '✅ Requisito actualizado con éxito.');
        } else {
            Requisito::create($data);
            session()->flash('success', '✅ Requisito creado con éxito.');
        }

        $this->cerrarFormulario();

        // 🔄 Actualizar lista en el DOM sin recargar la vista manualmente
        $this->dispatch('requisitosActualizados');
    }

    /**
     * Elimina un requisito existente.
     */
    public function eliminar($id)
    {
        if ($requisito = Requisito::find($id)) {
            $requisito->delete();
            session()->flash('success', '🗑️ Requisito eliminado correctamente.');
            $this->dispatch('requisitosActualizados');
        } else {
            session()->flash('error', 'El requisito no existe o ya fue eliminado.');
        }
    }

    /**
     * Limpia el formulario y lo oculta.
     */
    public function cerrarFormulario()
    {
        $this->reset(['requisitoId', 'titulo', 'detalle', 'mostrarFormulario']);
        $this->resetValidation();
    }
}
