<?php

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
        $product = new \App\Product();
        $product->productName ='Computer';
        $product->productPrice = 5000000;
        $product->image = 'uploads/W7MztUH05hol7Ly21aGerRedg7KVhIz7DTjhvzVF.png';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Computer 2';
        $product->productPrice = 5000000;
        $product->image = 'uploads/kxIudL3pMlBdRjuQUvB9SP4wv2XhbukZxltpZdb9.png';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Computer 3';
        $product->productPrice = 5000000;
        $product->image = 'uploads/W7MztUH05hol7Ly21aGerRedg7KVhIz7DTjhvzVF.png';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Computer 4';
        $product->productPrice = 5000000;
        $product->image = 'uploads/kxIudL3pMlBdRjuQUvB9SP4wv2XhbukZxltpZdb9.png';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Computer 5';
        $product->productPrice = 5000000;
        $product->image = 'uploads/W7MztUH05hol7Ly21aGerRedg7KVhIz7DTjhvzVF.png';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Computer 6';
        $product->productPrice = 5000000;
        $product->image = 'uploads/kxIudL3pMlBdRjuQUvB9SP4wv2XhbukZxltpZdb9.png';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Computer 7';
        $product->productPrice = 5000000;
        $product->image = 'uploads/W7MztUH05hol7Ly21aGerRedg7KVhIz7DTjhvzVF.png';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Computer 8';
        $product->productPrice = 5000000;
        $product->image = 'uploads/kxIudL3pMlBdRjuQUvB9SP4wv2XhbukZxltpZdb9.png';
        $product->save();
    }
}
