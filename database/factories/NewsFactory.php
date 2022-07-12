<?php

$factory->define(App\News::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "details" => $faker->name,
        "user_id" => factory('App\User')->create(),
    ];
});
