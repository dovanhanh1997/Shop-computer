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
        $product->productName ='Dell';
        $product->productPrice = 5000000;
        $product->image = 'uploads/W7MztUH05hol7Ly21aGerRedg7KVhIz7DTjhvzVF.png';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Asus';
        $product->productPrice = 6000000;
        $product->image = 'uploads/kxIudL3pMlBdRjuQUvB9SP4wv2XhbukZxltpZdb9.png';
        $product->save();
        $product = new \App\Product();
        $product->productName ='HP';
        $product->productPrice = 7000000;
        $product->image = 'uploads/W7MztUH05hol7Ly21aGerRedg7KVhIz7DTjhvzVF.png';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Dell Precision M6800';
        $product->productPrice = 8000000;
        $product->image = 'uploads/kxIudL3pMlBdRjuQUvB9SP4wv2XhbukZxltpZdb9.png';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Dell Precision M6700';
        $product->productPrice = 9000000;
        $product->image = 'uploads/W7MztUH05hol7Ly21aGerRedg7KVhIz7DTjhvzVF.png';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Dell Precision 3510';
        $product->productPrice = 10000000;
        $product->image = 'uploads/kxIudL3pMlBdRjuQUvB9SP4wv2XhbukZxltpZdb9.png';
        $product->save();
        $product = new \App\Product();
        $product->productName ='HP Zbook 17 g2';
        $product->productPrice = 11000000;
        $product->image = 'uploads/W7MztUH05hol7Ly21aGerRedg7KVhIz7DTjhvzVF.png';
        $product->save();
        $product = new \App\Product();
        $product->productName ='LENOVO THINKPAD W540';
        $product->productPrice = 12000000;
        $product->image = 'uploads/kxIudL3pMlBdRjuQUvB9SP4wv2XhbukZxltpZdb9.png';
        $product->save();
    }
}
