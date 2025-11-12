<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Requisito;

class RequisitosSeeder extends Seeder
{
    public function run(): void
    {
        $requisitos = [
            'Título de estudios secundarios o constancia de título en trámite.',
            'Fotocopia del DNI (frente y dorso).',
            'Fotografía 4x4 reciente (fondo claro).',
            'Certificado de salud actualizado emitido por entidad oficial.',
            'Título universitario de grado (mínimo 4 años).',
            'Certificado analítico.',
            'CV y carta de presentación.',
            'Entrevista de admisión (si aplica).',
        ];

        foreach ($requisitos as $descripcion) {
            Requisito::firstOrCreate(['descripcion' => $descripcion]);
        }

        $this->command->info('✅ Requisitos cargados correctamente sin duplicados.');
    }
}
