<?php

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'body' => $faker->sentence(6),
        'commentable_id' => $faker->numberBetween(1, 20),
        'commentable_type' => $faker->randomElement(['App\Customer', 'App\User']),
    ];
});