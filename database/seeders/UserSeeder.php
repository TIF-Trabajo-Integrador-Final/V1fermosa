<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'institutosuperiorfermosa@gmail.com'],
            [
                'name' => 'Administrador de la Pagina',
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}

