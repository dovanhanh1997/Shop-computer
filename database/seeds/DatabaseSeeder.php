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
        $this->call(UsersSeeder::class);
        $this->call(BillsSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(BillsProductsSeeder::class);
        $this->call(ProfilesSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(RolesSeeder::class);
    }
}
