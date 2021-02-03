<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Grados;
use Faker\Generator as Faker;

$factory->define(Grados::class, function (Faker $faker) {

    return [
        'descripcion' => $faker->word,
        'nivel_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
