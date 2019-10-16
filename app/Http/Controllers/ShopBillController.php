<?php

namespace App\Http\Controllers;

use App\Services\BillServiceInterface;
use App\Services\MailServiceInterface;
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
    /**
     * @var MailServiceInterface
     */
    private $mailService;

    public function __construct(BillServiceInterface $billService,
                                UserServiceInterface $userService,
                                MailServiceInterface $mailService)
    {
        $this->billService = $billService;
        $this->userService = $userService;
        $this->mailService = $mailService;
    }

    public function index()
    {
        $bills = $this->billService->getAll();
        return view('home.bill.list', compact('bills'));
    }

    public function storeBill(Request $request)
    {
        $this->billService->create($request);

        $bill = $this->mailService->getBill();
        $billProducts = $this->mailService->getBillsProducts(Session::get('billId'));
        $this->mailService->sendMailToAdmin($bill, $billProducts);

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
        $billProducts = $this->mailService->getBillsProducts($billId);
        return view('home.bill.detail', compact('bill', 'billProducts'));
    }
}
