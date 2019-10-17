<?php


namespace App\Services\impl;


use App\Services\LangServiceInterface;
use Illuminate\Support\Facades\Session;

class LangService implements LangServiceInterface
{

    private $lang = ['en','vi' ,];

    public function getCurrentLang()
    {
        return config('app.locale');
    }

    public function getAll()
    {
        Session::put('languages',$this->lang);
    }


}
