<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTransportSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('company_transport')->insert([
            [
                'company_id'        => 1,
                'transport_type_id' => 1,
                'total_seats'       => 40,
                'registration_no'   => 'BUS-1234',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
