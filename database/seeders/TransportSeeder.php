<?php

namespace Database\Seeders;

use App\Enums\AcType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transports')->insert([
            [
                'transport_type' => 'Bus',
                'ac_type'        => AcType::AC->value,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'transport_type' => 'Mini Bus',
                'ac_type'        => AcType::NON_AC->value,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}
