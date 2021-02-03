<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Evaluaciones;
use Faker\Generator as Faker;

$factory->define(Evaluaciones::class, function (Faker $faker) {

    return [
        'matricula_id' => $faker->word,
        'periodo_id' => $faker->word,
        'bimestre_id' => $faker->word,
        'capacidad_id' => $faker->word,
        'calificacion' => $faker->randomDigitNotNull,
        'observaciones' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
