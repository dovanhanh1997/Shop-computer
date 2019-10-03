<?php

namespace App\Http\Controllers;

use App\Http\Cart;
use App\Services\CartServiceInterface;
use App\Services\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * @var ProductServiceInterface
     */
    private $productService;
    /**
     * @var CartServiceInterface
     */
    private $cartService;

    public function __construct(CartServiceInterface $cartService,
                                ProductServiceInterface $productService)
    {
        $this->productService = $productService;
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cart = $this->cartService->getCart();
        $products = $this->cartService->getProduct();
        return view('home.cart.index', compact('cart', 'products', 'productQty'));
    }

    public function changeCart(Request $request, $productId)
    {
        $product = $this->productService->findById($productId);

        $this->cartService->updateOrDeleteCart($product, $request);

        return redirect()->back();
    }

    public function delete($productId)
    {
        $product = $this->productService->findById($productId);

        $this->cartService->deleteProductInCart($product);

        return redirect()->back();
    }
}
