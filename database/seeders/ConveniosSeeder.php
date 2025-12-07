<?php

namespace Database\Seeders;

use App\Models\Convenio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConveniosSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the convenios table.
     */
    public function run(): void
    {
        $convenios = [
            [
                'universidad' => 'Universidad Nacional del Chaco Austral',
                'logo' => 'convenios/lCOlUMJDKaCkjqW5MK7JB6G6vTPigx2uCLcCiCG6...',
                'url_mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3...',
            ],
            [
                'universidad' => 'Universidad Nacional de Villa María de Córdoba',
                'logo' => 'convenios/I6VfMMqG6qdoGZWyu1PJR7L0kHpk49cCSGuIXZuB...',
                'url_mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3...',
            ],
            [
                'universidad' => 'Universidad Nacional Fasta',
                'logo' => 'convenios/UTugSYjWfNgu3EyjkmKgx5j1bWjrh35tQoDaOie...',
                'url_mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3...',
            ],
            [
                'universidad' => 'Universidad Tecnología Nacional F.R. Resistencia',
                'logo' => 'convenios/I88TlYSUkjoo64y8Fn2EwFcyoTSH4I8gvXMQdX7B...',
                'url_mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3...',
            ],
            [
                'universidad' => 'Instituto Superior Oscar A. Albertazzi',
                'logo' => 'convenios/6OAdHtzRMvGMXJ0eXxNWcP83ZXnIZvsH63jUkr9b...',
                'url_mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3...',
            ],
        ];

        foreach ($convenios as $convenio) {
            Convenio::create($convenio);
        }
    }
}
