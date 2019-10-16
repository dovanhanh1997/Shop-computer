<?php


namespace App\Services\impl;


use App\Mail\SendMail;
use App\Mail\SendAdminMail;
use App\Services\BillServiceInterface;
use App\Services\MailServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MailService implements MailServiceInterface
{
    /**
     * @var BillServiceInterface
     */
    private $billService;

    public function __construct(BillServiceInterface $billService)
    {
        $this->billService = $billService;
    }

    public function getBill()
    {
        $billId = Session::get('billId');
        return $this->billService->findById($billId);
    }

    public function getBillsProducts($billId)
    {
        $billProducts = DB::table('bills_products')
            ->where('bill_id', $billId)
            ->get();
        return $billProducts;
    }

    public function sendMailToUser($request, $bill, $billProducts)
    {
        return Mail::to($request->user)->send(new SendMail($bill, $billProducts));
    }

    public function sendMailToAdmin($bill, $billProducts)
    {
        return Mail::to('dovan8704@gmail.com')->send(new SendAdminMail($bill, $billProducts));
    }
}
