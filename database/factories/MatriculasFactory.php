<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Matriculas;
use Faker\Generator as Faker;

$factory->define(Matriculas::class, function (Faker $faker) {

    return [
        'matricula_id' => $faker->word,
        'periodo_id' => $faker->word,
        'seccion_id' => $faker->word,
        'observaciones' => $faker->word,
        'exonerado' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
