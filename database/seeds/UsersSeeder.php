<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('admin');
        $user->save();
        $user = new User();
        $user->name = 'hanh';
        $user->email = 'dovanhanh12b@gmail.com';
        $user->password = Hash::make('dovanhanh123');
        $user->save();
    }
}
