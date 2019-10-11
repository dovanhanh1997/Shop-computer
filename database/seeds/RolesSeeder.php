<?php

use Illuminate\Database\Seeder;
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
        Role::create(['name' => 'SupperAdmin']);
        Role::create(['name' => 'Admin']);

        $admin = Admin::find(1);
        $admin->assignRole('Admin');
    }
}
