<?php

use App\Bill;
use Illuminate\Database\Seeder;

class BillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bill = new Bill();
        $bill->customer_id = '1';
        $bill->pay_date = '2019-09-23';
        $bill->total = '10000000';
        $bill->save();
        $bill = new Bill();
        $bill->customer_id = '2';
        $bill->pay_date = '2019-09-23';
        $bill->total = '8000000';
        $bill->save();
    }
}
