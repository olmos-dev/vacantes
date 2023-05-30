<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Candidato;
use App\Vacante;
use Faker\Generator as Faker;

$factory->define(Candidato::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'email' => $faker->email,
        'cv' => 'cv.pdf',
        'vacante_id' => Vacante::all()->random()->id,
    ];
});
