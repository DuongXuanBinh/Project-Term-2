<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
           [
               'id'=>10000101,
               'firstname'=>'DUONG THUY',
               'lastname'=>'NGAN',
               'dob'=>'1990/8/1',
               'account_id'=>1
           ],
            [
                'id'=>10000104,
                'firstname'=>'DUONG XUAN',
                'lastname'=>'BINH',
                'dob'=>'1995/11/10',
                'account_id'=>1
            ],
            [
                'id'=>10000105,
                'firstname'=>'NGUYEN TIEN',
                'lastname'=>'DAT',
                'dob'=>'1996/5/13',
                'account_id'=>2
            ],
            [
                'id'=>10000106,
                'firstname'=>'NGUYEN THAI',
                'lastname'=>'SON',
                'dob'=>'1996/5/13',
                'account_id'=>3
            ],
           [
               'id'=>10000102,
               'firstname'=>'NGUYEN THI',
               'lastname'=>'HANG',
               'dob'=>'1968/9/9',
               'account_id'=>1
           ],
            [
                'id'=>10000103,
                'firstname'=>'NGUYEN THUY',
                'lastname'=>'LINH',
                'dob'=>'1991/9/9',
                'account_id'=>2
            ],
        ]);
    }
}
