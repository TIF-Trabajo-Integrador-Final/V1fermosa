<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            NivelesSeeder::class,
            RequisitosSeeder::class,
            // CarreraRequisitoSeeder solo se usa si querés crear relaciones de prueba
            // CarreraRequisitoSeeder::class,
        ]);

        $this->command->info('🌱 Base de datos inicializada correctamente con niveles y requisitos.');
    }
}
