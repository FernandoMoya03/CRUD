<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modelos\Persona;
use App\Modelos\Producto;
use App\Modelos\Comentario;
use Faker\Generator as Faker;

$factory->define(App\Modelos\Comentario::class, function (Faker $faker) {
    return [
        //
        'comentario'=> $faker -> name(),
        'producto_id' => App\Modelos\Producto::all()->random()->id,
        'persona_id' => App\Modelos\Persona::all()->random()->id,
    ];
});
