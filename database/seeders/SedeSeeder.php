<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sedes')->insert([
            [
                'nombre' => 'Sede Formosa Capital',
                'direccion' => 'Maipú 850, Formosa, Argentina',
                'telefono' => 'N/A', 
                'mapa_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3580.4879172514097!2d-58.17528718304579!3d-26.18080185167697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x945ca5e57f332c37%3A0x4b9622711332ceb8!2sMaip%C3%BA%20850%2C%20P3600%20Formosa!5e0!3m2!1ses-419!2sar!4v1760808673644!5m2!1ses-419!2sar', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Sede Asunción, Paraguay',
                'direccion' => 'Av. Mariscal López, Asunción, Paraguay',
                'telefono' => 'N/A', 
                'mapa_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115425.65540731027!2d-57.68178068084533!3d-25.302465952104296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x945da8076e69dbf5%3A0xaceb7a46bf1936c9!2sAsunci%C3%B3n%2C%20Paraguay!5e0!3m2!1ses-419!2sar!4v1760809171696!5m2!1ses-419!2sar', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}