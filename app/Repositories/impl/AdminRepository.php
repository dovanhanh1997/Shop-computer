<?php


namespace App\Repositories\impl;


use App\Repositories\AdminRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AdminRepository implements AdminRepositoryInterface
{
    public function getAdminRoles()
    {
        $data = DB::table('model_has_roles')->get();
        return $data;
    }

    public function getRoles()
    {
        $data = DB::table('roles')->get();
        return $data;
    }
}
