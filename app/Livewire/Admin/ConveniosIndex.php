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
    public $imagen;       // Nueva imagen
    public $oldImagen;    // Imagen existente en BD

    public function mostrarFormulario($id = null)
    {
        $this->reset(['convenio_id', 'universidad', 'url_mapa', 'imagen', 'oldImagen']);
        $this->resetValidation();

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
        $this->resetValidation();
    }

    public function guardar()
    {
        // Reglas dinámicas
        $rules = [
            'universidad' => 'required|string|max:255',
            'url_mapa'    => 'required|string|max:10000',
            'imagen'      => [
                $this->convenio_id ? 'nullable' : 'required',
                'image',
                'mimes:jpg,jpeg,png,webp,gif,svg,bmp,tiff,ico',
                'max:5120'
            ],
        ];

        $this->validate($rules);

        // ============================
        //   PROCESAR IMAGEN NUEVA
        // ============================
        $logoPath = $this->oldImagen;

        if ($this->imagen) {

            // eliminar imagen anterior si existe
            if ($this->oldImagen && File::exists(public_path($this->oldImagen))) {
                File::delete(public_path($this->oldImagen));
            }

            // nombre único
            $filename = uniqid() . '.' . $this->imagen->getClientOriginalExtension();

            // crear directorio si no existe
            $destination = public_path('images/convenios');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            // guardar imagen dentro de public/images/convenios
            $this->imagen->storeAs('images/convenios', $filename, 'public_path');

            // ruta que se guarda en BD
            $logoPath = 'images/convenios/' . $filename;
        }

        // ============================
        //   GUARDAR O ACTUALIZAR
        // ============================
        if ($this->convenio_id) {

            Convenio::findOrFail($this->convenio_id)->update([
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

        // eliminar imagen física
        if ($convenio->logo && File::exists(public_path($convenio->logo))) {
            File::delete(public_path($convenio->logo));
        }

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
