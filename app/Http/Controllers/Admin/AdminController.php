<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRequestForm;
use App\Repositories\impl\AdminService;
use App\Services\AdminServiceInterface;
use App\Services\BillServiceInterface;
use App\Services\ProductServiceInterface;
use App\Services\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * @var UserServiceInterface
     */
    private $userService;
    /**
     * @var ProductServiceInterface
     */
    private $productService;
    /**
     * @var BillServiceInterface
     */
    private $billService;
    /**
     * @var \AdminServiceInterface
     */
    private $adminService;

    public function __construct(AdminService $adminService)
    {
//        $this->middleware('auth:admin');

        $this->adminService = $adminService;
    }

    public function index()
    {
        $adminRoles = $this->adminService->getAdminRoles();
        $data = $this->adminService->getAll();
        $this->adminService->getAdminRole();
        return view('admin.admin-home',compact('data','adminRoles'));
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
        ])) {
            return redirect()->route('admin.admin-home');
        }
        return redirect()->route('admin.showLoginForm');
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        Session::flush();
        return $this->loggedOut($request) ?: redirect('/admin/login');
    }

    protected function loggedOut(Request $request)
    {
        //
    }
}
