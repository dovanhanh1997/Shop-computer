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
        $product->image = 'https://cdn.tgdd.vn/Products/Images/44/89026/Slider/dell-vostro-3568-xf6c62-1.jpg';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Asus';
        $product->productPrice = 6000000;
        $product->image = 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcS1-76PnawAEKtR6__hEDaO9ISqAPyGSHR2z2GU0geqBOwGlPwTYHqVK8srSTwHI3x0CeJG08CefA&usqp=CAc';
        $product->save();
        $product = new \App\Product();
        $product->productName ='HP';
        $product->productPrice = 7000000;
        $product->image = 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcTAYo13SxS4pjjp9nuknLYVn700IipdeBftKxzp00YPrEq7cyHGkTCe7xLmJPCxAL3WDZfcx_eV&usqp=CAc';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Dell Precision M6800';
        $product->productPrice = 8000000;
        $product->image = 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcTXQmy8wvqQGMobh3PBHcOolpbVXizBX60yz5JLfzg51QFI2kgAYUYTZvLIBhfYhAjMgz2EFAXt&usqp=CAc';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Dell Precision M6700';
        $product->productPrice = 9000000;
        $product->image = 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcSnW4z8-zZgk2jUuTOxigedtYfNfeY-fNz3uh6YWNYU1Ge6OdWOOu1wRuoAbUt7a4ldqnU6jJU&usqp=CAc';
        $product->save();
        $product = new \App\Product();
        $product->productName ='Dell Precision 3510';
        $product->productPrice = 10000000;
        $product->image = 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcTXQmy8wvqQGMobh3PBHcOolpbVXizBX60yz5JLfzg51QFI2kgAYUYTZvLIBhfYhAjMgz2EFAXt&usqp=CAc';
        $product->save();
        $product = new \App\Product();
        $product->productName ='HP Zbook 17 g2';
        $product->productPrice = 11000000;
        $product->image = 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcS9RWQfPT37Z5wsJKnSw-zPz9SjLpt7yoMi2jn-E78bLeZKcUGtL6XV2S6rfw&usqp=CAc';
        $product->save();
        $product = new \App\Product();
        $product->productName ='LENOVO THINKPAD W540';
        $product->productPrice = 12000000;
        $product->image = 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSNNxUrhtzfPT9SQGKqQtQe9KhXaw1QaRZSMV71B6CFXqpMp1zWOBpqs6_pQkm3OTETlYsa4cdh2sU&usqp=CAc';
        $product->save();
    }
}
