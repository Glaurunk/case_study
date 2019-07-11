<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'age' => $faker->numberBetween(18,50)
    ];
});
