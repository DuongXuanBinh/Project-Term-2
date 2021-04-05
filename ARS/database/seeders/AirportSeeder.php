<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airports')->insert([
            [
                'id'=>1,
                'name'=>'Ha Noi',
                'airport_code'=>'HAN'
            ],
            [
                'id'=>2,
                'name'=>'TP Ho Chi Minh',
                'airport_code'=>'SGN'
            ],
            [
                'id'=>3,
                'name'=>'Nha Trang',
                'airport_code'=>'CXR'
            ],
            [
                'id'=>4,
                'name'=>'Van Don',
                'airport_code'=>'VDO'
            ],
            [
                'id'=>5,
                'name'=>'Da Nang',
                'airport_code'=>'DAD'
            ]
        ]);
    }
}
