<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Secciones;
use Faker\Generator as Faker;

$factory->define(Secciones::class, function (Faker $faker) {

    return [
        'periodo_id' => $faker->word,
        'letra' => $faker->word,
        'nrovacantes' => $faker->randomDigitNotNull,
        'grado_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
