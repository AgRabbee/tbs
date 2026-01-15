<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        // One query for all roles
        $roles = Role::whereIn('name', ['Super Admin', 'Admin', 'Customer'])
            ->get()
            ->keyBy('name');

        // System Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@tbs.com'],
            [
                'first_name'  => 'system',
                'last_name'   => 'admin',
                'password'    => Hash::make('123456'),
                'phone'       => '01799872659',
                'nid'         => '123456789',
                'user_status' => 1,
            ]
        );
        $admin->roles()->syncWithoutDetaching($roles['Super Admin']->id);

        // Company Admin
        $companyAdmin = User::firstOrCreate(
            ['email' => 'companyAdmin@tbs.com'],
            [
                'first_name'  => 'company',
                'last_name'   => 'admin',
                'password'    => Hash::make('123456'),
                'phone'       => '01799872659',
                'nid'         => '123456789',
                'user_status' => 1,
            ]
        );
        $companyAdmin->roles()->syncWithoutDetaching([
            $roles['Customer']->id,
            $roles['Admin']->id,
        ]);

        // Customer
        $customer = User::firstOrCreate(
            ['email' => 'a@b.com'],
            [
                'first_name'  => 'Ag',
                'last_name'   => 'Rabbee',
                'password'    => Hash::make('123456'),
                'phone'       => '01799872659',
                'nid'         => '123456789',
                'user_status' => 1,
            ]
        );
        $customer->roles()->syncWithoutDetaching($roles['Customer']->id);
    }
}
