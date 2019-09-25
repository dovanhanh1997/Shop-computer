<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->productName = 'Dell';
        $product->productPrice = '5000000';
        $product->save();
        $product = new Product();
        $product->productName = 'Asus';
        $product->productPrice = '6000000';
        $product->save();
    }
}
