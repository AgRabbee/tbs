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
        $adminRole = Role::where('name','Admin')->first();
        $customerRole = Role::where('name','Customer')->first();

        $admin = new User;
        $admin->first_name = 'system';
        $admin->last_name = 'admin';
        $admin->email = 'admin@tbs.com';
        $admin->password = bcrypt('123456');
        $admin->phone= '01799872659';
        $admin->nid = '123456789';
        $admin->save();
        $admin->roles()->attach($adminRole);

    }
}
