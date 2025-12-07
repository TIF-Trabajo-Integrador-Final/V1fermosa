<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Carrera;
use App\Models\Requisito;

class CarrerasRequisitoSeeder extends Seeder
{
    public function run(): void
    {
        $carreras = Carrera::all();
        $requisitos = Requisito::pluck('id')->toArray();

        if ($carreras->isEmpty() || empty($requisitos)) {
            $this->command->error('❌ No hay carreras o requisitos cargados.');
            return;
        }

        foreach ($carreras as $carrera) {
            foreach ($requisitos as $req) {
                DB::table('carrera_requisito')->updateOrInsert([
                    'carrera_id' => $carrera->id,
                    'requisito_id' => $req
                ]);
            }
        }

        $this->command->info('✅ Relaciones carrera–requisitos cargadas correctamente.');
    }
}
