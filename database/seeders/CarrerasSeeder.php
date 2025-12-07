<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carreras')->insert([
            [
                'nombre' => 'Tecnicatura Superior en Comercio Internacional',
                'nivel_id' => 1,
                'modalidad' => 'Presencial',
                'descripcion' => 'Carrera con una duración de 3 años con Título Nacional.',
                'perfil_profesional' => 'Profesional con sólida formación técnica y experiencia práctica.',
                'duracion_meses' => 36,
                'imagen' => 'carreras/7TIL2mIhH0FRTT3r7SUraqVB4iwvS4QMEFrUrmj.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Tecnicatura Superior en Administración, Facturación y Auditaría en Salud',
                'nivel_id' => 1,
                'modalidad' => 'Presencial',
                'descripcion' => 'Carrera con una duración de 3 años con Título Nacional.',
                'perfil_profesional' => 'Será un profesional con conocimientos técnicos, administrativos y de gestión.',
                'duracion_meses' => 36,
                'imagen' => 'carreras/XFFU9bh53ATpLXpSzJLbnaSmIBkuu1xgksjiHpfo.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Tecnicatura Superior en Gestión Integral de Negocios',
                'nivel_id' => 1,
                'modalidad' => 'Presencial',
                'descripcion' => 'Carrera con una duración de 3 años con Título Nacional.',
                'perfil_profesional' => 'Será un profesional con sólida formación en Empresas, Gestión y Administración.',
                'duracion_meses' => 36,
                'imagen' => 'carreras/EWezpKEDPOkJx2WLez4Wds4nGEzR5Neudh9vecrTal.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Tecnicatura Superior en Desarrollador de Software',
                'nivel_id' => 1,
                'modalidad' => 'Presencial',
                'descripcion' => 'Carrera con una duración de 3 años con Título Nacional.',
                'perfil_profesional' => 'Será un profesional competente en el análisis, diseño y construcción de software.',
                'duracion_meses' => 36,
                'imagen' => 'carreras/LDWwpMihGDzKvwW1oSmkQSUSP23P1N0nQeez5AJeJT.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
