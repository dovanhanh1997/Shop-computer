<?php

namespace App\Http\Controllers;

use App\Services\BillServiceInterface;
use App\Services\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ShopBillController extends Controller
{
    /**
     * @var BillServiceInterface
     */
    private $billService;
    /**
     * @var UserServiceInterface
     */
    private $userService;

    public function __construct(BillServiceInterface $billService,
                                UserServiceInterface $userService)
    {
        $this->billService = $billService;
        $this->userService = $userService;
    }

    public function index()
    {
        $bills = $this->billService->getAll();
        return view('home.bill.list', compact('bills'));
    }

    public function storeBill(Request $request)
    {

        $this->billService->create($request);
        return redirect()->route('mail.form');
    }

    public function getMyBill()
    {
        $user = $this->userService->findById(Auth::user()->id);
        if (!$user->profile) return redirect()->route('home.user.registerProfile');
        $bills = $this->billService->findByUserId(Auth::user()->id);
        return view('home.bill.myBill', compact('bills'));
    }

    public function getBillDetail($billId)
    {
        $bill = $this->billService->findById($billId);
        $billProducts = DB::table('bills_products')
            ->where('bill_id', $billId)
            ->get();
        return view('home.bill.detail', compact('bill', 'billProducts'));
    }
}
