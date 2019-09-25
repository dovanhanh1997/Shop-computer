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
        $user->name = 'Hanh';
        $user->email = 'dovanhanh12b@gmail.com';
        $user->password = Hash::make('dovanhanh123');
        $user->save();
    }
}
