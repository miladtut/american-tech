<?php

$factory->define(App\Newsimage::class, function (Faker\Generator $faker) {
    return [
        "news_id" => factory('App\News')->create(),
    ];
});
