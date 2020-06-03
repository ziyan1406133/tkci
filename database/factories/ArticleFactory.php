<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Article\Article;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Article::class, function (Faker $faker) {
    $title = $faker->text(25);
    return [
        'title' => $title,
        'slug' => Str::slug($title,'-'),
        'content' => $faker->text(200),
        'status' => 'Published',
        'cover' => 'images/article/no_cover.png',
        'date' => Carbon::now(),
        'category_id' => $faker->numberBetween($min = 1, $max = 2),
        'author_id' => '1',
    ];
});
