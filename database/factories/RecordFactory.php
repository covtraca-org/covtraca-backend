<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Record;
use Faker\Generator as Faker;

$factory->define(Record::class, function (Faker $faker) {

    return [
        'uid' => $faker->randomDigitNotNull,
        'long' => $faker->randomDigitNotNull,
        'lat' => $faker->randomDigitNotNull,
        'symptoms' => $faker->word,
        'tested' => $faker->word,
        'test_positive' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
