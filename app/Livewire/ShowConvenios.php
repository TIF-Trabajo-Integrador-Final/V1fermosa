<?php

namespace App\Livewire;

use Livewire\Component;

class ShowConvenios extends Component
{
    public $convenios = [];

    public function mount()
    {
        $this->convenios = [
            [
                'universidad' => 'Universidad Tecnológica Nacional F.R. Resistencia',
                'titulo' => 'Convenio Marco Trabajo Final Integrador',
                'logo' => 'utn.jpeg',
                'resolucion' => 'Resolución N° 123/2024 (Ejemplo)',
                'info_carrera' => 'Información sobre la carrera de Ingeniería en Sistemas de Información y el TFI.'
            ],
            [
                'universidad' => 'Instituto de Formación Docente y Técnica Nivel Inicial',
                'titulo' => 'Prácticas Profesionalizantes en el área administrativa',
                'logo' => 'carreras.jpg',
                'resolucion' => 'Resolución N° 456/2024 (Ejemplo)',
                'info_carrera' => 'Aplicación de Saberes en Entornos Reales para la Tecnicatura de Administración.'
            ],
            [
                'universidad' => 'Instituto Superior de Arte Oscar A. Albertazzi',
                'titulo' => 'Convenio Específico de Cooperación Institucional',
                'logo' => 'albertazzi.jpeg',
                'resolucion' => 'Resolución N° 789/2024 (Ejemplo)',
                'info_carrera' => 'Detalles sobre la cooperación para las carreras de artes visuales.'
            ],
            [
                'universidad' => 'Universidad FASTA',
                'titulo' => 'Convenio de Constitución de Centro Articulador',
                'logo' => 'fasta.jpg',
                'resolucion' => 'Resolución N° 101/2024 (Ejemplo)',
                'info_carrera' => 'Información sobre el centro articulador para carreras a distancia.'
            ],
        ];
    }

    public function render()
    {
        return view('livewire.show-convenios')
            ->layout('components.layouts.app', ['title' => 'Universidades']);
    }
}
