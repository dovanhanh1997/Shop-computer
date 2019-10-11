<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequestForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.admin-home');
    }

    public function showLoginForm()
    {
        return view('admin.admin-login');
    }

    public function login(AdminRequestForm $request)
    {
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])){
            return redirect()->route('admin.admin-home');
        }
        return redirect()->route('admin.showLoginForm');
    }
}
