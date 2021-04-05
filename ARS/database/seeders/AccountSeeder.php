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
            'firstname'=>'Duong',
            'lastname'=>'Xuan Binh',
            'address'=>'Tay Mo, Nam Tu Liem, Ha Noi',
            'dob'=>'1995/11/10',
            'sex'=>'Male',
            'credit_number'=>'1111111111',
            'phone'=>'0947118116',
            'sky_miles'=>'0',
            'role'=>1
            ],
            [
                'id'=>2,
                'email'=>'datntth2002021@fpt.edu.vn',
                'password'=>'111111',
                'firstname'=>'Nguyen',
                'lastname'=>'Tien Dat',
                'address'=>'Van Phuc, Ha Dong, Ha Noi',
                'dob'=>'1996/5/13',
                'sex'=>'Male',
                'credit_number'=>'2222222222',
                'phone'=>'0852873838',
                'sky_miles'=>'0',
                'role'=>1
            ],
            [
                'id'=>3,
                'email'=>'xuanbinh1011@gmail.com',
                'password'=>'111111',
                'firstname'=>'Nguyen',
                'lastname'=>'Thai Son',
                'address'=>'Quang An, Tay Ho, Ha Noi',
                'dob'=>'1996/3/15',
                'sex'=>'Female',
                'credit_number'=>'3333333333',
                'phone'=>'0912164000',
                'sky_miles'=>'0',
                'role'=>1
            ],
        ]);
    }
}
