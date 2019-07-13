<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name'      => $faker->sentence(6, true),
        'author_id' => $faker->numberBetween(1, 10)
    ];
});

$factory->define(Book::class, function () {
    return [
        'name'  => '車輪の下で',
        'author_id' => 1
    ];
}, 'test_book_data_1');

$factory->define(Book::class, function () {
    return [
        'id'     => 1,
        'name'  => '車輪の下で',
        'author_id' => 1,
        'author' => [
            'id'     => 1,
            'name' => 'ヘルマン・ヘッセ'
        ]
    ];
}, 'test_book_mock_data_1');
