<?php

$factory->define(App\Course::class, function (Faker\Generator $faker) {
    return [
        "name_course" => $faker->name,
        "trainer_name" => $faker->name,
        "details" => $faker->name,
    ];
});
