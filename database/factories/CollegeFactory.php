<?php

$factory->define(App\College::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
