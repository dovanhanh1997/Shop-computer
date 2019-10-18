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
        $user->id = 1234314;
        $user->name = 'hong';
        $user->email = 'hong@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
        $user = new User();
        $user->id = 12343434;
        $user->name = 'hanh';
        $user->email = 'hanh12b@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
        $user = new User();
        $user->id = 123412434;
        $user->name = 'nam';
        $user->email = 'nam@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
        $user = new User();
        $user->id = 1234234234;
        $user->name = 'hoa';
        $user->email = 'hoa@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
    }
}
