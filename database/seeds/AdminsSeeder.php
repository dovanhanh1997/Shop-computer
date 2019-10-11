<?php

use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Admin();
        $admin->name = 'admin';
        $admin->email = 'admin@example.com';
        $admin->role = 1;
        $admin->password = \Illuminate\Support\Facades\Hash::make('password');
        $admin->save();
    }
}
