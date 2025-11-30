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
    'logo' => 'utn.jpeg',
    'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6853.903302053995!2d-63.260894!3d-32.410675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94336fb7b3c8c6f1%3A0x1f1eac0c4e7242!2sUniversidad%20Nacional%20de%20Villa%20Mar%C3%ADa%20(UNVM)!5e0!3m2!1ses-419!2sar!4v1701300000000!5m2!1ses-419!2sar'
],
[
    'universidad' => 'Universidad Nacional del Chaco Austral',
    'logo' => 'uncaus.jpeg',
    'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6853.903302053995!2d-63.260894!3d-32.410675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94336fb7b3c8c6f1%3A0x1f1eac0c4e7242!2sUniversidad%20Nacional%20de%20Villa%20Mar%C3%ADa%20(UNVM)!5e0!3m2!1ses-419!2sar!4v1701300000000!5m2!1ses-419!2sar'
],
[
    'universidad' => 'Universidad de Villa María de Córdoba',
    'logo' => 'villamaria.jpeg',
    'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6853.903302053995!2d-63.260894!3d-32.410675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94336fb7b3c8c6f1%3A0x1f1eac0c4e7242!2sUniversidad%20Nacional%20de%20Villa%20Mar%C3%ADa%20(UNVM)!5e0!3m2!1ses-419!2sar!4v1701300000000!5m2!1ses-419!2sar'
],
[
    'universidad' => 'Instituto Superior de Arte Oscar A. Albertazzi',
    'logo' => 'albertazzi.jpeg',
    'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6853.903302053995!2d-63.260894!3d-32.410675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94336fb7b3c8c6f1%3A0x1f1eac0c4e7242!2sUniversidad%20Nacional%20de%20Villa%20Mar%C3%ADa%20(UNVM)!5e0!3m2!1ses-419!2sar!4v1701300000000!5m2!1ses-419!2sar'
],
[
    'universidad' => 'Universidad FASTA',
    'logo' => 'fasta.jpg',
    'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6853.903302053995!2d-63.260894!3d-32.410675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94336fb7b3c8c6f1%3A0x1f1eac0c4e7242!2sUniversidad%20Nacional%20de%20Villa%20Mar%C3%ADa%20(UNVM)!5e0!3m2!1ses-419!2sar!4v1701300000000!5m2!1ses-419!2sar'
]
        ];
    }   


    public function render()
    {
        return view('livewire.show-convenios')
            ->layout('components.layouts.app', ['title' => 'Universidades']);
    }
}
