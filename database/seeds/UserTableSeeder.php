<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SuperAdminRole = Role::where('name','Super Admin')->first();
        $adminRole = Role::where('name','Admin')->first();
        $customerRole = Role::where('name','Customer')->first();

        $admin = new User;
        $admin->first_name = 'system';
        $admin->last_name = 'admin';
        $admin->email = 'admin@tbs.com';
        $admin->password = bcrypt('123456');
        $admin->phone= '01799872659';
        $admin->nid = '123456789';
        $admin->user_status = '1';
        $admin->save();
        $admin->roles()->attach($SuperAdminRole);

        $user = new User;
        $user->first_name = 'Ag';
        $user->last_name = 'Rabbee';
        $user->email = 'a@b.com';
        $user->password = bcrypt('123456');
        $user->phone= '01799872659';
        $user->nid = '123456789';
        $user->user_status = '1';
        $user->save();
        $user->roles()->attach($customerRole);

    }
}
