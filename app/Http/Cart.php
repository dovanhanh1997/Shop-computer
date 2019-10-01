<?php


namespace App\Http;


class Cart
{
    public $product;
    public $totalQty;
    public $totalPrice;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->product = $oldCart->product;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addInToCart($product)
    {
        $storeProduct = ['qty' => 0, 'price' => $product->price, 'product' => $product,];
        if ($this->product) {
            if (array_key_exists($product->id, $this->product)) {
                $storeProduct = $this->product[$product->id];
            };
        }

        $storeProduct['qty']++;
        $storeProduct['price'] = $product->price * $storeProduct['qty'];
        $this->product[$product->id] = $storeProduct;
        $this->totalQty++;
        $this->totalPrice = $product->price;
    }
}
