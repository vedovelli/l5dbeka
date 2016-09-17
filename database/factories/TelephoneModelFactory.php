<?php

$factory->define(App\Telephone::class, function (Faker\Generator $faker) {
    return [
        'number' => $faker->e164PhoneNumber,
        'type' => $faker->randomElements(['mobile', 'land'])[0],
    ];
});
