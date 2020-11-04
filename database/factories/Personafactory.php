<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modelos\Persona;
use Faker\Generator as Faker;

$factory->define(App\Modelos\Persona::class, function (Faker $faker)
 {
     
    return [
        'nombre'=> $faker -> name(),
        'apellido_pat'=> $faker->name(),
        'apellido_mat'=> $faker->name()
    ];
});
