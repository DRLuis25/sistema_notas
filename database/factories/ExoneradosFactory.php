<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Exonerados;
use Faker\Generator as Faker;

$factory->define(Exonerados::class, function (Faker $faker) {

    return [
        'matricula_id' => $faker->word,
        'periodo_id' => $faker->word,
        'curso_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
