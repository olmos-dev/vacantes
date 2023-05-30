<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use Faker\Generator as Faker;
use App\{Categoria, Experiencia, Salary, Ubicacion, Vacante,User};

$factory->define(Vacante::class, function (Faker $faker) {
    //se asigna un nuero de 1 a 12 a las fotos que estan en el storage
    $numero = rand(1,12);
    //se crea un texto de 1000 caracteres para la descripcion
    $texto = $faker->text(1000);
    return [
        'user_id' => User::all()->random()->id,
        'categoria_id' => Categoria::all()->random()->id,
        'experiencia_id' => Experiencia::all()->random()->id,
        'ubicacion_id' => Ubicacion::all()->random()->id,
        'salario_id' => Salary::all()->random()->id,
        'titulo' => $faker->sentence,
        'imagen' => 'job'.$numero.'.jpg',
        'activa' => rand(1,0),
        'descripcion' => '<p>'.$texto.'</p>',
        'created_at' => $faker->dateTimeBetween('-15 days', Carbon::now())
    ];
});
