<?php

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new Company;
        $company->company_name = "Ticket Booking System";
        $company->description = "This is an easy platform for booking tickets.";
        $company->fees = '21';
        $company->save();
    }
}
