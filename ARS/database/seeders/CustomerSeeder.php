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
               'id'=>1,
               'firstname'=>'Duong',
               'lastname'=>'Thuy Ngan',
               'dob'=>'1990/8/1',
               'account_id'=>1
           ],
           [
               'id'=>2,
               'firstname'=>'Nguyen',
               'lastname'=>'Thi Hang',
               'dob'=>'1968/9/9',
               'account_id'=>1
           ],
            [
                'id'=>3,
                'firstname'=>'Nguyen',
                'lastname'=>'Thuy Linh',
                'dob'=>'1991/9/9',
                'account_id'=>2
            ],
        ]);
    }
}
