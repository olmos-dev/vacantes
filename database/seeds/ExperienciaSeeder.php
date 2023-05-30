<?php

use App\Experiencia;
use Illuminate\Database\Seeder;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experiencia::create([
            'nombre' => '0 - 6 Meses'
        ]);
        Experiencia::create([
            'nombre' => '6 Meses - 1 Año'
        ]);
        Experiencia::create([
            'nombre' => '1 - 3 Años'
        ]);
        Experiencia::create([
            'nombre' => '3 - 5 Años'
        ]);
        Experiencia::create([
            'nombre' => '5 -7 Años'
        ]);
        Experiencia::create([
            'nombre' => '7 - 10 años'
        ]);
        Experiencia::create([
            'nombre' => '10 -12 años'
        ]);
        Experiencia::create([
            'nombre' => '12 - 15 años'
        ]);
    }
}
