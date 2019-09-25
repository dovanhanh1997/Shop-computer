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
        $product->image ='uploads/W7MztUH05hol7Ly21aGerRedg7KVhIz7DTjhvzVF.png';
        $product->save();

        $product = new Product();
        $product->productName = 'Asus';
        $product->productPrice = '6000000';
        $product->image = 'uploads/kxIudL3pMlBdRjuQUvB9SP4wv2XhbukZxltpZdb9.png';
        $product->save();
    }
}
