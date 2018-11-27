<?php

use Faker\Generator as Faker;

use App\Lead;

$factory->define(App\Lead::class, function (Faker $faker) {

    $firstName = $faker->firstName;
    $lastName = $faker->lastName;
    return [
        'type' => Lead::ORGANIC_TYPE,
        'status' => Lead::LEAD_STATUS,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'full_name' => $firstName . ' ' . $lastName,
        'email' => $faker->unique()->safeEmail,

    ];
});
