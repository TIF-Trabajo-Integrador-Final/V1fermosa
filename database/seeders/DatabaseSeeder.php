<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call([
        UserSeeder::class,
        NivelesSeeder::class,
        RequisitosSeeder::class,
        CarrerasSeeder::class,
        CarrerasRequisitoSeeder::class, // si necesitas asociar carrera–requisito
    ]);
}

}
