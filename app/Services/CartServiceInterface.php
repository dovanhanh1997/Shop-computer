<?php


namespace App\Services;


interface CartServiceInterface
{
    public function getCart();

    public function getProduct();

    public function getProductQty();

    public function checkCartExist($key);

    public function putCartIntoSession($key, $value);

    public function updateOrDeleteCart($product, $request);

    public function deleteProductInCart($product);

    public function checkAnyProductInCart();

}
