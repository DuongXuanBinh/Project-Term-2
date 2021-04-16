<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            [
                'id'=>1,
            'email'=>'binhdxth2004002@fpt.edu.vn',
            'password'=>'111111',
            'firstname'=>'Duong Xuan',
            'lastname'=>'Binh',
            'address'=>'Tay Mo, Nam Tu Liem, Ha Noi',
            'dob'=>'1995/11/10',
            'sex'=>'Male',
            'credit_number'=>'1111111111',
            'phone'=>'0947118116',
            'sky_miles'=>4884,
            'role'=>1
            ],
            [
                'id'=>2,
                'email'=>'datntth2002021@fpt.edu.vn',
                'password'=>'111111',
                'firstname'=>'Nguyen Tien',
                'lastname'=>'Dat',
                'address'=>'Van Phuc, Ha Dong, Ha Noi',
                'dob'=>'1996/5/13',
                'sex'=>'Male',
                'credit_number'=>'2222222222',
                'phone'=>'0852873838',
                'sky_miles'=>2442,
                'role'=>1
            ],
            [
                'id'=>3,
                'email'=>'xuanbinh1011@gmail.com',
                'password'=>'111111',
                'firstname'=>'Nguyen Thai',
                'lastname'=>'Son',
                'address'=>'Quang An, Tay Ho, Ha Noi',
                'dob'=>'1996/3/15',
                'sex'=>'Female',
                'credit_number'=>'3333333333',
                'phone'=>'0912164000',
                'sky_miles'=>3020,
                'role'=>1
            ],
            [
                'id'=>4,
                'email'=>'xubiii.95@gmail.com',
                'password'=>'111111',
                'firstname'=>'Admin',
                'lastname'=>'Admin',
                'address'=>'Tay Mo, Nam Tu Liem, Ha Noi',
                'dob'=>'1995/10/11',
                'sex'=>'Male',
                'credit_number'=>'4444444444',
                'phone'=>'0932555666',
                'skymile'=>0,
                'role'=>2
            ]
        ]);
    }
}
