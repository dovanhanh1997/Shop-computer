<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Admin();
        $admin->name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = \Illuminate\Support\Facades\Hash::make('password');
        $admin->assignRole('admin');
        $admin->save();

        $admin = new \App\Admin();
        $admin->name = 'admin-one';
        $admin->email = 'initManage@example.com';
        $admin->password = \Illuminate\Support\Facades\Hash::make('password');
        $admin->assignRole('init_manage');
        $admin->save();
        $admin = new \App\Admin();
        $admin->name = 'admin-two';
        $admin->email = 'invoiceManage@example.com';
        $admin->password = \Illuminate\Support\Facades\Hash::make('password');
        $admin->assignRole('invoice_manage');
        $admin->save();


    }
}
