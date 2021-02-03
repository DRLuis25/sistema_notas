<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Catedra;
use Faker\Generator as Faker;

$factory->define(Catedra::class, function (Faker $faker) {

    return [
        'periodo_id' => $faker->word,
        'docente_id' => $faker->word,
        'curso_id' => $faker->word,
        'grado_id' => $faker->word,
        'seccion_id' => $faker->word,
        'nrohoras' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
