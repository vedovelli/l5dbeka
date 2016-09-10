<?php

$factory->define(App\Example::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'street' => $faker->streetName,
        'stree2' => $faker->streetAddress,
        'number' => '100',
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'postal' => '01311-010',
        'birth_date' => '1990-01-01',
    ];
});
