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
                'id'=>'HAN',
                'name'=>'Ha Noi',
            ],
            [
                'id'=>'SGN',
                'name'=>'TP Ho Chi Minh',
            ],
            [
                'id'=>'CXR',
                'name'=>'Nha Trang',
            ],
            [
                'id'=>'VDO',
                'name'=>'Van Don',
            ],
            [
                'id'=>'DAD',
                'name'=>'Da Nang',
            ]
        ]);
    }
}
