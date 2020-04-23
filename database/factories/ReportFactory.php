<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Report;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {

    return [
        'answer' => $faker->word,
        'question_id' => $faker->randomDigitNotNull,
        'device_id' => $faker->randomDigitNotNull,
        'lat' => $faker->randomDigitNotNull,
        'long' => $faker->randomDigitNotNull,
        'timestamp' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
