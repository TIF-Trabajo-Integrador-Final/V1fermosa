<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carrera;
use App\Models\Requisito;
use App\Models\Nivel;

class CarreraRequisitoSeeder extends Seeder
{
    public function run(): void
    {
        $nivel = Nivel::firstOrCreate(['nombre' => 'Licenciatura']);

        $carrera = Carrera::firstOrCreate([
            'nombre' => 'Licenciatura en Informática',
            'nivel_id' => $nivel->id,
            'descripcion' => 'Carrera orientada a la formación profesional en el ámbito de la informática y los sistemas.',
            'perfil_profesional' => 'El egresado podrá analizar, diseñar y administrar sistemas informáticos complejos.',
            'duracion_meses' => 48,
            'convenio' => json_encode([]),
            'imagen' => null,
        ]);

        $requisitos = Requisito::inRandomOrder()->take(4)->pluck('id');
        $carrera->requisitos()->sync($requisitos);

        $this->command->info('✅ Carrera de ejemplo creada con requisitos asociados.');
    }
}
