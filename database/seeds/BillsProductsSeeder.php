<?php

use App\Bill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillsProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills_products')->insert([
           'bill_id' => 1,
           'product_id' => 1,
           'quantity'=> 2,
        ]);
        DB::table('bills_products')->insert([
           'bill_id' => 1,
           'product_id' => 2,
           'quantity'=> 1,
        ]);
        DB::table('bills_products')->insert([
           'bill_id' => 2,
           'product_id' => 2,
           'quantity'=> 1,
        ]);
    }
}
