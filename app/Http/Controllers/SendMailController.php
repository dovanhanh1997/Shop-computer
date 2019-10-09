<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Services\BillServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail as MailData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SendMailController extends Controller
{
    /**
     * @var BillServiceInterface
     */
    private $billService;

    public function __construct(BillServiceInterface $billService)
    {
        $this->billService = $billService;
    }

    public function form()
    {
        return view('home.mail.form');
    }

    public function sendMail(Request $request)
    {
        $billId = Session::get('billId');
        $bill = $this->billService->findById($billId);
        $billProducts = DB::table('bills_products')
            ->where('bill_id', $billId)
            ->get();
        Mail::to($request->user)->send(new SendMail($bill,$billProducts));

        $this->clearSession();
        return redirect()->back();
    }

    public function clearSession(): void
    {
        Session::put('cart', null);
        Session::put('billId', null);
    }
}
