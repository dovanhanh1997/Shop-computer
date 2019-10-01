<?php

namespace App\Http\Controllers;

use App\Services\ProductServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var ProductServiceInterface
     */
    private $productService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductServiceInterface $productService)
    {
        $this->middleware('auth');
        $this->productService = $productService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = $this->productService->getAll();
        return view('home.home',compact('products'));
    }

    public function detail($id)
    {
        $product = $this->productService->findById($id);
        return view('home.detail',compact('product'));
    }
}
