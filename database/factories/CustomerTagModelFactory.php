<?php

$factory->define(App\CustomerTag::class, function (Faker\Generator $faker) {
    return [
        'customer_id' => $faker->numberBetween(1, 20),
        'tag_id' => $faker->numberBetween(1, 5),
    ];
});