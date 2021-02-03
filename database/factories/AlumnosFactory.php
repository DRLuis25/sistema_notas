<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Alumnos;
use Faker\Generator as Faker;

$factory->define(Alumnos::class, function (Faker $faker) {
    $gender = $faker->randomElements(['Male', 'Female'])[0];
    return [
        'dni' => $faker->numberBetween(10561489, 75194622),
        'nombres' => $faker->name($gender),
        'otrosNombres' => $faker->name($gender),
        'apellidoPaterno' => $faker->lastName,
        'apellidoMaterno' => $faker->lastName,
        'email' => $faker->email,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => null,
        'deleted_at' => null
    ];
});
