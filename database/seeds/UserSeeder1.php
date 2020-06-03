<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new User;
        $data->username = 'super_admin';
        $data->name = 'Super Admin';
        $data->email = 'tkci@gmail.com';
        $data->password = Hash::make('password');
        $data->bio = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce condimentum sit amet sem sed vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia viverra.";
        $data->role = 'Super Admin';
        $data->save();
    }
}
