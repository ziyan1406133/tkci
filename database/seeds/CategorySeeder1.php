<?php

use App\Model\Article\Category;
use Illuminate\Database\Seeder;

class CategorySeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Category;
        $data->id = '1';
        $data->name = 'Pengumuman';
        $data->save();

        $data = new Category;
        $data->id = '2';
        $data->name = 'Kajian Islami';
        $data->save();
    }
}
