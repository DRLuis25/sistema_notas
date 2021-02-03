<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Capacidades;
use Faker\Generator as Faker;

$factory->define(Capacidades::class, function (Faker $faker) {

    return [
        'periodo_id' => $faker->word,
        'curso_id' => $faker->word,
        'grado_id' => $faker->word,
        'asignatura' => $faker->word,
        'abreviatura' => $faker->word,
        'orden' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
