<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CursoGrado;
use Faker\Generator as Faker;

$factory->define(CursoGrado::class, function (Faker $faker) {

    return [
        'periodo_id' => $faker->word,
        'curso_id' => $faker->word,
        'grado_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
