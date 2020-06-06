<?php

use App\Model\Article\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class, 10)->create();
    }
}
