<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {

    $created = $faker->dateTimeBetween('-20 years', '-20 days');

    return [
        'birthdate' => $created,
        'date_hired' => $created,
    ];
});
