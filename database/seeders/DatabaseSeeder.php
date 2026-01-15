<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleTableSeeder::class,
            UserTableSeeder::class,
            RoleUserTableSeeder::class,
            DistrictsTableSeeder::class,
            CompanySeeder::class,
            TransportSeeder::class,
            CompanyUserSeeder::class,
            CompanyTransportSeeder::class,
        ]);
    }
}
