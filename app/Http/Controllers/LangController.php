<?php

namespace App\Http\Controllers;

use App\Services\LangServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class LangController extends Controller
{
    /**
     * @param $lang
     * @param Request $request
     * @return array
     */

    public function changeLang($lang)
    {
        Session::put('lang', $lang);
        return back();
    }
}

