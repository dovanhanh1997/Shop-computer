<?php


namespace App\Services\impl;


use App\Http\Cart;
use App\Services\CartServiceInterface;
use Illuminate\Support\Facades\Session;

class CartService implements CartServiceInterface
{

    public function getCart()
    {
        return Session::get('cart');
    }

    public function getProduct()
    {
        $array = [];
        $cart = $this->getCart();

        foreach ($cart->product as $product) {
            array_push($array, $product);
        }
        return $array;
    }

    public function getProductQty()
    {
        $array = [];
        $cart = $this->getCart();

        foreach ($cart->product as $product) {
            array_push($array, $product['qty']);
        }
        return $array;
    }

    public function checkCartExist($cart)
    {
        if (Session::has($cart)) {
            return Session::get($cart);
        } else {
            return null;
        }
    }

    public function putCartIntoSession($key,$value)
    {
        Session::put($key,$value);
    }

    public function updateOrDeleteCart($product, $request)
    {
        $oldCart = $this->checkCartExist('cart');

        $cart = new Cart($oldCart);
        $cart->changeCart($product, $request);

        $this->putCartIntoSession('cart',$cart);
    }

    public function deleteProductInCart($product)
    {
        $oldCart = $this->checkCartExist('cart');

        $cart = new Cart($oldCart);

        $cart->deleteInCart($product);

        $this->putCartIntoSession('cart', $cart);

    }

    public function checkAnyProductInCart()
    {
        if (Session::has('cart')) return true;
        Session::flash('noProductInCart','No product in Cart');
        return false;
    }
}
