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
               'firstname'=>'Duong Thuy',
               'lastname'=>'Ngan',
               'dob'=>'1990/8/1',
               'account_id'=>1
           ],
            [
                'id'=>10000104,
                'firstname'=>'Duong Xuan',
                'lastname'=>'Binh',
                'dob'=>'1995/11/10',
                'account_id'=>1
            ],
            [
                'id'=>10000105,
                'firstname'=>'Nguyen Tien',
                'lastname'=>'Dat',
                'dob'=>'1996/5/13',
                'account_id'=>2
            ],
            [
                'id'=>10000106,
                'firstname'=>'Nguyen Thai',
                'lastname'=>'Son',
                'dob'=>'1996/5/13',
                'account_id'=>3
            ],
           [
               'id'=>10000102,
               'firstname'=>'Nguyen Thi Hang',
               'lastname'=>'Hang',
               'dob'=>'1968/9/9',
               'account_id'=>1
           ],
            [
                'id'=>10000103,
                'firstname'=>'Nguyen Thuy',
                'lastname'=>'Linh',
                'dob'=>'1991/9/9',
                'account_id'=>2
            ],
        ]);
    }
}
