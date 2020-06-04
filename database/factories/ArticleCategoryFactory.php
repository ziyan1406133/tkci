<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Article\ArticleCategory;
use Faker\Generator as Faker;


$factory->define(ArticleCategory::class, function (Faker $faker) {
    return [
        'article_id' => $faker->numberBetween($min = 1, $max = 50),
        'category_id' => $faker->numberBetween($min = 1, $max = 2),
    ];
});

