<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConveniosSeeder extends Seeder
{
    public function run(): void
    {
        $convenios = [
            [
                'universidad' => 'Universidad Nacional del Chaco Austral',
                'logo' => 'images/convenios/uncaus.jpeg',
                'url_mapa' => 'https://www.google.com/maps/embed?...',
            ],
            [
                'universidad' => 'Universidad Nacional de Villa María de Córdoba',
                'logo' => 'images/convenios/villamaria.jpeg',
                'url_mapa' => 'https://www.google.com/maps/embed?...',
            ],
            [
                'universidad' => 'Universidad Nacional Fasta',
                'logo' => 'images/convenios/fasta.jpeg',
                'url_mapa' => 'https://www.google.com/maps/embed?...',
            ],
            [
                'universidad' => 'Universidad Tecnología Nacional F.R. Resistencia',
                'logo' => 'images/convenios/utn.jpeg',
                'url_mapa' => 'https://www.google.com/maps/embed?...',
            ],
            [
                'universidad' => 'Instituto Superior Oscar A. Albertazzi',
                'logo' => 'images/convenios/albertazzi.jpeg',
                'url_mapa' => 'https://www.google.com/maps/embed?...',
            ],
        ];

        foreach ($convenios as $conv) {
            DB::table('convenios')->updateOrInsert(
                ['universidad' => $conv['universidad']],
                [
                    'logo' => $conv['logo'],
                    'url_mapa' => $conv['url_mapa'],
                    'updated_at' => now(),
                ]
            );
        }

        $this->command->info('✔ Convenios cargados o actualizados correctamente.');
    }
}
