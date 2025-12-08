<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Models\Convenio;
use Illuminate\Support\Facades\File;

class ConveniosIndex extends Component
{
    use WithFileUploads;

    public $isFormVisible = false;
    public $convenio_id;
    public $universidad;
    public $url_mapa;
    public $imagen;
    public $oldImagen;

    public function mostrarFormulario($id = null)
    {
        $this->reset([
            'convenio_id',
            'universidad',
            'url_mapa',
            'imagen',
            'oldImagen'
        ]);

        $this->resetValidation();

        if ($id) {
            $c = Convenio::findOrFail($id);

            $this->convenio_id = $c->id;
            $this->universidad = $c->universidad;
            $this->url_mapa = $c->url_mapa;
            $this->oldImagen = $c->logo;
        }

        $this->isFormVisible = true;
    }

    public function guardar()
    {
        $rules = [
            'universidad' => 'required|string|max:255',
            'url_mapa'    => 'required|string|max:2000',
            'imagen' => [
                $this->convenio_id ? 'nullable' : 'required',
                'image',
                'max:5120',
            ]
        ];

        $this->validate($rules);

        $logoPath = $this->oldImagen;

        // ===========================
        //  MANEJO DE IMAGEN CORRECTO
        // ===========================
        if ($this->imagen) {

            if ($this->oldImagen && File::exists(public_path($this->oldImagen))) {
                File::delete(public_path($this->oldImagen));
            }

            $filename = uniqid() . '.' . $this->imagen->getClientOriginalExtension();

            $destination = public_path('images/convenios');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            $this->imagen->storeAs('images/convenios', $filename, 'public_path');

            $logoPath = 'images/convenios/' . $filename;
        }

        if ($this->convenio_id) {
            Convenio::findOrFail($this->convenio_id)->update([
                'universidad' => $this->universidad,
                'url_mapa' => $this->url_mapa,
                'logo' => $logoPath,
            ]);

            session()->flash('ok', 'Convenio actualizado.');

        } else {
            Convenio::create([
                'universidad' => $this->universidad,
                'url_mapa' => $this->url_mapa,
                'logo' => $logoPath,
            ]);

            session()->flash('ok', 'Convenio creado.');
        }

        $this->resetFormulario();
    }

    public function eliminar($id)
    {
        $c = Convenio::findOrFail($id);

        if ($c->logo && File::exists(public_path($c->logo))) {
            File::delete(public_path($c->logo));
        }

        $c->delete();

        session()->flash('ok', 'Convenio eliminado.');
    }

    public function resetFormulario()
    {
        $this->reset();
        $this->resetValidation();
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.convenios-index', [
            'convenios' => Convenio::all()
        ]);
    }
}
