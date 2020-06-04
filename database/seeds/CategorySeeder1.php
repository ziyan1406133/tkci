<?php

use App\Model\Article\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'Pengumuman';
        $data = new Category;
        $data->id = '1';
        $data->name = $name;
        $data->slug = Str::slug($name, '-');
        $data->save();

        $name = 'Kajian Islami';
        $data = new Category;
        $data->id = '2';
        $data->name = $name;
        $data->slug = Str::slug($name, '-');
        $data->save();
    }
}
