<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer();
        $customer->customerName = Str::random(10);
        $customer->customerPhone = 0223452234;
        $customer->save();
        $customer = new Customer();
        $customer->customerName = Str::random(10);
        $customer->customerPhone = 0223452234;
        $customer->save();
    }
}
