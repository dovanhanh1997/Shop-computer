<?php

namespace App\Http\Controllers;

use App\Services\CartServiceInterface;
use App\Services\ProductServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $productService;
    /**
     * @var CartServiceInterface
     */
    private $cartService;


    public function __construct(ProductServiceInterface $productService,
                                CartServiceInterface $cartService)
    {
        $this->productService = $productService;
        $this->cartService = $cartService;
    }


    public function index()
    {
        $products = $this->productService->getAll();
        return view('home.home', compact('products'));
    }

    public function detail($id)
    {
        $product = $this->productService->findById($id);
        return view('home.detail', compact('product'));
    }

    public function home()
    {
        $products = $this->productService->getAll();
        return view('home.home', compact('products'));
    }

    public function checkOut()
    {
        $products = $this->cartService->getProduct();
        return view('home.check-out',compact('products'));
    }
}
