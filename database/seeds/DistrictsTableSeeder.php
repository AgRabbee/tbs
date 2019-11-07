<?php

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('districts')->delete();
        
        \DB::table('districts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dhaka',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Faridpur',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Gazipur',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Gopalganj',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Jamalpur',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Kishoreganj',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Madaripur',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Manikganj',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Munshiganj',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Mymensingh',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Narayanganj',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Narsingdi',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Netrokona',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Rajbari',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Shariatpur',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Sherpur',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Tangail',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Bogura',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Joypurhat',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Naogaon',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Natore',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Chapainawabganj',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Pabna',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Rajshahi',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Sirajgonj',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Dinajpur',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Gaibandha',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Kurigram',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Lalmonirhat',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Nilphamari',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Panchagarh',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Rangpur',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Thakurgaon',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Barguna',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Barishal',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Bhola',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Jhalokati',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Patuakhali',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Pirojpur',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Bandarban',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Brahmanbaria',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Chandpur',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Chattogram',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Cumilla',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Cox\'s Bazar',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Feni',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Khagrachhari',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Lakshmipur',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Noakhali',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Rangamati',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Habiganj',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Moulvibazar',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Sunamganj',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Sylhet',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Bagerhat',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Chuadanga',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Jashore',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Jhenaidah',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Khulna',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Kushtia',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Magura',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Meherpur',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Narail',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Satkhira',
            ),
        ));
        
        
    }
}