<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nivel;

class NivelesSeeder extends Seeder
{
    public function run(): void
    {
        $niveles = [
            'Tecnicatura Universitaria',
            'Licenciatura',
            'Diplomatura',
            'Especialización',
            'Maestría',
            'Doctorado',
        ];

        foreach ($niveles as $nombre) {
            Nivel::firstOrCreate(['nombre' => $nombre]);
        }

        $this->command->info('✅ Niveles cargados sin duplicados correctamente.');
    }
}
