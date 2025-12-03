<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Models\Convenio;

class ConveniosIndex extends Component
{
    use WithFileUploads;

    public $isFormVisible = false;
    public $convenio_id;
    public $universidad;
    public $url_mapa;

    // Imagen nueva (temporal)
    public $imagen;

    // Imagen anterior cuando se edita
    public $oldImagen;

    // --- BORRAMOS LA FUNCIÓN rules() DE AQUÍ ---

    public function mostrarFormulario($id = null)
    {
        $this->reset(['convenio_id', 'universidad', 'url_mapa', 'imagen', 'oldImagen']);

        if ($id) {
            $convenio = Convenio::findOrFail($id);
            $this->convenio_id = $convenio->id;
            $this->universidad = $convenio->universidad;
            $this->url_mapa    = $convenio->url_mapa;
            $this->oldImagen   = $convenio->logo;
        }

        $this->isFormVisible = true;
    }

    public function resetFormulario()
    {
        $this->reset();
        // Limpiamos los errores de validación anteriores
        $this->resetValidation(); 
    }

    public function guardar()
    {
        // 1. Definimos las reglas AQUÍ DENTRO para asegurar que lea bien el ID
        $rules = [
            'universidad' => 'required|string|max:255',
            'url_mapa'    => 'required|string|max:10000',
            // Usamos sintaxis de array para mayor seguridad
            'imagen'      => [
                $this->convenio_id ? 'nullable' : 'required', 
                'mimes:jpg,jpeg,png,webp,gif,svg,bmp,tiff,ico',
                'max:5120'
            ],
        ];

        // 2. Ejecutamos la validación manualmente con esas reglas
        $this->validate($rules);

        // Procesar imagen
        $logoPath = $this->oldImagen;

        if ($this->imagen) {
            $logoPath = $this->imagen->store('convenios', 'public');
        }

        if ($this->convenio_id) {
            Convenio::find($this->convenio_id)->update([
                'universidad' => $this->universidad,
                'url_mapa'    => $this->url_mapa,
                'logo'        => $logoPath,
            ]);

            session()->flash('ok', 'Convenio actualizado.');
        } else {
            Convenio::create([
                'universidad' => $this->universidad,
                'url_mapa'    => $this->url_mapa,
                'logo'        => $logoPath,
            ]);

            session()->flash('ok', 'Convenio creado.');
        }

        $this->resetFormulario();
    }

    public function eliminar($id)
    {
        $convenio = Convenio::findOrFail($id);
        $convenio->delete();

        session()->flash('ok', 'Convenio eliminado.');
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $convenios = Convenio::all();
        return view('livewire.admin.convenios-index', compact('convenios'));
    }
}