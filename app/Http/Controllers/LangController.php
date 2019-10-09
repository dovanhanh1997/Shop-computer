<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function changeLang(Request $request)
    {
        $lang = $request->lang;
        Session::put('lang',$lang);
//        dd(Session::get('lang',$lang));
        return redirect()->route('home');
    }
}
