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
        'content' => $faker->paragraphs($nb = 5, $asText = true) ,
        'status' => 'Published',
        'cover' => 'images/article/no_cover.png',
        'date' => Carbon::now(),
        'author_id' => '1',
    ];
});
