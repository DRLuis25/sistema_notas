<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MatriculaMaestro;
use Faker\Generator as Faker;

$factory->define(MatriculaMaestro::class, function (Faker $faker) {

    return [
        'nromatricula' => $faker->word,
        'alumno_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
