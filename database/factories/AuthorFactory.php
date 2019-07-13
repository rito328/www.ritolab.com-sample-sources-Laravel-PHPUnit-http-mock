<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(Author::class, function () {
    return [
        'name' => 'ヘルマン・ヘッセ'
    ];
}, 'test_author_data_1');
