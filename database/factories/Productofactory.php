<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modelos\Producto;
use Faker\Generator as Faker;

$factory->define(App\Modelos\Producto::class, function (Faker $faker) {
    return [
        //
        'NombreProducto'=> $faker -> name(),
    ];
});
