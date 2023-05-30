<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'Front-end'
        ]);
        Categoria::create([
            'nombre' => 'Back-end'
        ]);
        Categoria::create([
            'nombre' => 'Full-stack'
        ]);
        Categoria::create([
            'nombre' => 'DevOps'
        ]);
        Categoria::create([
            'nombre' => 'DBA'
        ]);
        Categoria::create([
            'nombre' => 'UX / UI'
        ]);
        Categoria::create([
            'nombre' => 'Techlead'
        ]);
        Categoria::create([
            'nombre' => 'Testing'
        ]);
        Categoria::create([
            'nombre' => 'Software Enginner'
        ]);
        Categoria::create([
            'nombre' => 'Senior programmer'
        ]);
    }
}
