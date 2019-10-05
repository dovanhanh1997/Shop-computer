<?php

use Illuminate\Database\Seeder;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = new \App\Profile();
        $profile->user_id   = 1;
        $profile->profileFullName = 'Admin';
        $profile->profilePhone = '12345678';
        $profile->image = null;
        $profile->save();
    }
}
