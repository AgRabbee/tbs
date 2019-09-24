<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = new Role;
        $super_admin->name = 'Super Admin';
        $super_admin->description = 'Super Admin has the full power of this application';
        $super_admin->save();

        $admin = new Role;
        $admin->name = 'Admin';
        $admin->description = 'Admin has only access to his own company account';
        $admin->save();

        $driver = new Role;
        $driver->name = 'Driver';
        $driver->description = 'Driver has only access to his own account through mobile application';
        $driver->save();

        $customer = new Role;
        $customer->name = 'Customer';
        $customer->description = 'Customer has only access to his own account';
        $customer->save();

    }
}
