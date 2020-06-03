<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder1::class);
        // $this->call(CategorySeeder1::class);
        $this->call(ArticleSeeder1::class);
    }
}
