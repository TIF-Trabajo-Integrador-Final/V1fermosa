<?php
namespace App\Livewire\Carreras;


use Livewire\Component;
use App\Models\Carrera;


class Form extends Component
{
public $carrera_id, $nombre, $nivel, $arancel_matricula, $arancel_mensual, $descripcion;


protected $rules = [
'nombre' => 'required|min:3',
'nivel' => 'required',
];


public function mount($id = null)
{
if ($id) {
$carrera = Carrera::findOrFail($id);
$this->carrera_id = $carrera->id;
$this->nombre = $carrera->nombre;
$this->nivel = $carrera->nivel;
$this->arancel_matricula = $carrera->arancel_matricula;
$this->arancel_mensual = $carrera->arancel_mensual;
$this->descripcion = $carrera->descripcion;
}
}


public function save()
{
$this->validate();


Carrera::updateOrCreate(['id' => $this->carrera_id], [
'nombre' => $this->nombre,
'nivel' => $this->nivel,
'arancel_matricula' => $this->arancel_matricula,
'arancel_mensual' => $this->arancel_mensual,
'descripcion' => $this->descripcion,
]);


session()->flash('message', 'Carrera guardada correctamente.');
return redirect()->route('carreras.index');
}


public function render()
{
return view('livewire.carreras.form');
}
}
