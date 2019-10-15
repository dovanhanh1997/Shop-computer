<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    private $bill;
    private $billProducts;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bill, $billProducts)
    {
        //
        $this->bill = $bill;
        $this->billProducts = $billProducts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('home.mail.send')
            ->subject('Shop-Computer bill detail')
            ->with(['bill' => $this->bill,
                    'billproducts' => $this->billProducts,
            ]);
    }
}
