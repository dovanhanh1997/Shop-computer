<?php

namespace App\Http\Controllers;

use App\Http\Cart;
use App\Services\ProductServiceInterface;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class CartController extends Controller
{
    /**
     * @var ProductServiceInterface
     */
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function addToCart($productId)
    {
        $product = $this->productService->findById($productId);
        if (Session::has('cart')){
            $oldCart = Session::get('cart');
        } else{
            $oldCart = null;
        }

        $cart = new Cart($oldCart);
        $cart->addInToCart($product);

        Session::put("cart",$cart);
        return redirect()->back();
    }
}
