<?php

$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "auther_name" => $faker->name,
        "user_id" => factory('App\User')->create(),
        "name" => $faker->name,
        "mobile" => $faker->name,
        "email" => $faker->name,
        "type" => collect(["free","sale",])->random(),
    ];
});
