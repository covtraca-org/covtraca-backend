<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'value' => $faker->word,
        'type' => $faker->randomElement(['Select:select', 'Text:text', 'Number:number', 'Checkbox:checkbox', 'Radio:radio', 'Textarea:textarea', 'Email:email', 'Tel:tel', 'Date:date', 'File:file', 'Toggle:toggle']),
        'options' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
