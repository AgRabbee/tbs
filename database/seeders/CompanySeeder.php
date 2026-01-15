<?php

namespace Database\Seeders;

use App\Enums\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'company_name'   => 'TBS Transport',
                'description'    => 'Bus service company',
                'address'        => 'Dhaka',
                'reg_no'         => 'REG-001',
                'tin_no'         => 123456789,
                'company_image'  => 'company1.png',
                'trade'          => 'Transport',
                'vat'            => 'VAT-001',
                'fees'           => 5000,
                'company_status' => Status::ACTIVE->value,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}
