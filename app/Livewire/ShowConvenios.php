<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Convenio;
use Illuminate\Support\Facades\File;

class ShowConvenios extends Component
{
    use WithFileUploads;

    public $convenio;
    public $universidad;
    public $logo;
    public $url_mapa;
    public $descripcion;

    public function mount(Convenio $convenio = null)
    {
        if ($convenio) {
            $this->convenio = $convenio;
            $this->universidad = $convenio->universidad;
            $this->url_mapa = $convenio->url_mapa;
            $this->descripcion = $convenio->descripcion;
        }
    }

    // ==============================
    //        GUARDAR NUEVO
    // ==============================
    public function store()
    {
        $this->validate([
            'universidad' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'url_mapa' => 'nullable|string',
            'descripcion' => 'nullable|string',
        ]);

        $logoPath = null;

        if ($this->logo) {
            $filename = uniqid() . '.' . $this->logo->getClientOriginalExtension();
            $destination = public_path('images/convenios');

            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            $this->logo->storeAs('images/convenios', $filename, 'public_path');
            $logoPath = 'images/convenios/' . $filename;
        }

        Convenio::create([
            'universidad' => $this->universidad,
            'logo' => $logoPath,
            'url_mapa' => $this->url_mapa,
            'descripcion' => $this->descripcion,
        ]);

        session()->flash('ok', 'Convenio creado correctamente.');

        return redirect()->route('admin.convenios.index');
    }

    // ==============================
    //       ACTUALIZAR
    // ==============================
    public function update()
    {
        $this->validate([
            'universidad' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'url_mapa' => 'nullable|string',
            'descripcion' => 'nullable|string',
        ]);

        $convenio = $this->convenio;

        if ($this->logo) {

            if ($convenio->logo && File::exists(public_path($convenio->logo))) {
                File::delete(public_path($convenio->logo));
            }

            $filename = uniqid() . '.' . $this->logo->getClientOriginalExtension();
            $destination = public_path('images/convenios');

            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            $this->logo->storeAs('images/convenios', $filename, 'public_path');
            $convenio->logo = 'images/convenios/' . $filename;
        }

        $convenio->universidad = $this->universidad;
        $convenio->descripcion = $this->descripcion;
        $convenio->url_mapa = $this->url_mapa;
        $convenio->save();

        session()->flash('ok', 'Convenio actualizado correctamente.');

        return redirect()->route('admin.convenios.index');
    }

    public function render()
    {
        return view('livewire.show-convenios', [
            'convenios' => Convenio::all()
        ]);
    }
}
