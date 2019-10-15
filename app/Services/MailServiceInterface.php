<?php


namespace App\Services;


interface MailServiceInterface
{
    public function getBill();

    public function getBillsProducts($billId);

    public function sendMailToUser($request, $bill, $billProducts);

    public function sendMailToAdmin($bill, $billProducts);
}
