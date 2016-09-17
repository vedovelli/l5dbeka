<?php

$factory->define(App\Address::class, function (Faker\Generator $faker) {
    return [
        'street' => $faker->streetName,
        'street2' => implode(' ', $faker->words(3)),
        'neighborhood' => implode(' ', $faker->words(2)),
        'number' => $faker->numberBetween(1, 10),
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'postal' => '01311-010',
        'country' => $faker->country,
    ];
});