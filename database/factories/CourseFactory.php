<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Course;
use App\Teacher;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'teacher_id' => random_int(1, 10),
        'title' => $faker->sentence,
        'date' => $faker->date,
        'start_time' => $faker->time,
        'end_time' => $faker->time,
    ];
});
