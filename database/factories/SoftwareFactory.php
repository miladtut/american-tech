<?php

$factory->define(App\Software::class, function (Faker\Generator $faker) {
    return [
        "tool_name" => $faker->name,
    ];
});
