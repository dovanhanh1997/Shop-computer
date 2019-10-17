<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Services\BillServiceInterface;
use App\Services\CartServiceInterface;
use App\Services\LangServiceInterface;
use App\Services\ProductServiceInterface;
use App\Services\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
    /**
     * @var UserServiceInterface
     */
    private $userService;
    /**
     * @var LangServiceInterface
     */
    private $langService;


    public function __construct(ProductServiceInterface $productService,
                                CartServiceInterface $cartService,
                                BillServiceInterface $billService,
                                UserServiceInterface $userService
    )
    {
        $this->productService = $productService;
        $this->cartService = $cartService;
        $this->billService = $billService;
        $this->userService = $userService;
    }


    public function index($id = null)
    {
//        if (config('app.locale') == 'en'){
//            dd(config('app.locale'));
//        }
//

        if ($id) {
            $user =$this->userService->findById($id);
            Auth::login($user,true);
        }

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

    public function indexLogin($social, $userId)
    {
        dd($userId);
        $products = $this->productService->getAll();
        return view('home.home', compact('products'));
    }
}
