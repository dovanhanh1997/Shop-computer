<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Mail as MailData;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function form()
    {
        return view('home.mail.form');
    }

    public function sendMail(Request $request)
    {
        $data = new MailData('Hello', 'This is my first mail');
        Mail::to($request->user)->send(new SendMail($data));
        return redirect()->back();
    }
}
