<?php

namespace App\Http\Controllers;

use App\Services\BillServiceInterface;
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
    /**
     * @var BillServiceInterface
     */
    private $billService;


    public function __construct(ProductServiceInterface $productService,
                                CartServiceInterface $cartService,
                                BillServiceInterface $billService)
    {
        $this->productService = $productService;
        $this->cartService = $cartService;
        $this->billService = $billService;
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

    public function checkOut()
    {
        $products = $this->cartService->getProduct();
        return view('home.check-out', compact('products'));
    }

    public function search(Request $request)
    {
        $products = $this->productService->findByKey($request->keySearch);
        return view('home.home', compact('products'));

    }
}
