<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CountReport;
use Faker\Generator as Faker;

$factory->define(CountReport::class, function (Faker $faker) {

    return [
        'country_code' => $faker->word,
        'count' => $faker->randomDigitNotNull,
        'country_name' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
