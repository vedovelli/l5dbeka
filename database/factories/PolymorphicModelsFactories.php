<?php


$factory->define(App\Video::class, function (Faker\Generator $faker) {
    return [
        'title' => implode(' ', $faker->words(5)),
        'url' => $faker->url,
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => implode(' ', $faker->words(5)),
        'body' => $faker->sentence(6),
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'body' => $faker->sentence(6),
        'commentable_type' => $faker->randomElement(['App\Post', 'App\Video']),
        'commentable_id' => $faker->numberBetween(1, 10)
    ];
});
