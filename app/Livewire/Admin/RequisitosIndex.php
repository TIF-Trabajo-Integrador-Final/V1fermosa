<?php

namespace App\Livewire\Admin;

use App\Models\Requisito;
use Livewire\Component;
use Illuminate\Validation\Rule;

class RequisitosIndex extends Component
{
    public $requisitos;

    // Campos del formulario
    public $requisito_id;
    public $descripcion;
    public $isFormVisible = false;

    /**
     * Reglas de validación corregidas
     */
    protected function rules()
    {
        return [
            'descripcion' => 'required|string|max:500', // CAMBIO
        ];
    }

    public function mount()
    {
        $this->cargarDatos();
    }

    /**
     * Carga los requisitos desde la BD
     */
    private function cargarDatos()
    {
        $this->requisitos = Requisito::orderBy('id', 'desc')->get(); // CAMBIO: ordenado
    }

    public function render()
    {
        return view('livewire.admin.requisitos-index')
            ->layout('components.layouts.admin', [
                'title' => 'Panel Administrativo - Instituto Superior Fermosa'
            ]);
    }

    /**
     * Muestra el formulario (crear o editar)
     */
    public function mostrarFormulario($id = null)
    {
        $this->resetFormulario(); // CAMBIO

        if ($id) {
            $req = Requisito::find($id);

            if (!$req) return;

            $this->requisito_id = $req->id;
            $this->descripcion = $req->descripcion;
        }

        $this->isFormVisible = true;
    }

    /**
     * Guarda o actualiza un requisito
     */
    public function guardar()
    {
        $this->validate();

        $data = [
            'descripcion' => $this->descripcion,
        ];

        Requisito::updateOrCreate(
            ['id' => $this->requisito_id],
            $data
        );

        $this->cargarDatos();
        $this->resetFormulario();

        session()->flash('ok', 'Requisito guardado correctamente.');
    }

    /**
     * Elimina un requisito (si no está en uso)
     */
    public function eliminar($id)
    {
        $req = Requisito::with('carreras')->find($id);

        if (!$req) return;

        if ($req->carreras->count() > 0) {
            // CAMBIO: evita romper la BD
            session()->flash('error', 'No es posible eliminar este requisito porque está asignado a una o más carreras.');
            return;
        }

        $req->delete();

        $this->cargarDatos();

        session()->flash('ok', 'Requisito eliminado correctamente.');
    }

    /**
     * Resetea el formulario del modal
     */
    public function resetFormulario()
    {
        $this->reset([
            'requisito_id',
            'descripcion',
            'isFormVisible'
        ]);

        $this->resetValidation();
    }
}
