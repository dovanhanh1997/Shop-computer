<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use \Spatie\Permission\Models\Role;
use App\Admin;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin', 'guard_name' => 'web', 'objManage' => 'Shop']);
        Role::create(['name' => 'init_manage', 'guard_name' => 'web', 'objManage' => 'Product']);
        Role::create(['name' => 'invoice_manage', 'guard_name' => 'web', 'objManage' => 'Bill']);

        Permission::create(['name' => 'create_admin']);

        Permission::create(['name' => 'create_product']);
        Permission::create(['name' => 'read_product']);
        Permission::create(['name' => 'update_product']);
        Permission::create(['name' => 'delete_product']);

        Permission::create(['name' => 'create_bill']);
        Permission::create(['name' => 'read_bill']);
        Permission::create(['name' => 'update_bill']);
        Permission::create(['name' => 'delete_bill']);

        $admin = Role::findById(1);
        $admin->givePermissionTo(Permission::all());

        $initManage = Role::findById(2);
        $initManage->givePermissionTo(Permission::findById(2));
        $initManage->givePermissionTo(Permission::findById(3));
        $initManage->givePermissionTo(Permission::findById(4));

        $invoiceManage = Role::findById(3);
        $invoiceManage->givePermissionTo(Permission::findById(5));
        $invoiceManage->givePermissionTo(Permission::findById(6));
        $invoiceManage->givePermissionTo(Permission::findById(7));
    }
}
