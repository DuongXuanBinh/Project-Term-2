<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteDirectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('route_directs')->insert([
            [
                'id'=>'1',
                'origin_airportid'=>'HAN',
                'arrival_airportid'=>'SGN',
                'skymile'=>'1221',
                'duration'=>'1:50'
            ],
            [
                'id'=>'2',
                'origin_airportid'=>'SGN',
                'arrival_airportid'=>'HAN',
                'skymile'=>'1221',
                'duration'=>'1:50'
            ],
            [
                'id'=>'3',
                'origin_airportid'=>'HAN',
                'arrival_airportid'=>'CXR',
                'skymile'=>'860',
                'duration'=>'1:20'
            ],
            [
                'id'=>'4',
                'origin_airportid'=>'CXR',
                'arrival_airportid'=>'HAN',
                'skymile'=>'860',
                'duration'=>'1:20'
            ],
            [
                'id'=>'5',
                'origin_airportid'=>'VDO',
                'arrival_airportid'=>'DAD',
                'skymile'=>'920',
                'duration'=>'1:30'
            ],
            [
                'id'=>'6',
                'origin_airportid'=>'DAD',
                'arrival_airportid'=>'VDO',
                'skymile'=>'920',
                'duration'=>'1:30'
            ],
            [
                'id'=>'7',
                'origin_airportid'=>'DAD',
                'arrival_airportid'=>'SGN',
                'skymile'=>'670',
                'duration'=>'1:05'
            ],
            [
                'id'=>'8',
                'origin_airportid'=>'SGN',
                'arrival_airportid'=>'DAD',
                'skymile'=>'670',
                'duration'=>'1:05'
            ],
            [
                'id'=>'9',
                'origin_airportid'=>'VDO',
                'arrival_airportid'=>'CXR',
                'skymile'=>'1030',
                'duration'=>'1:40'
            ],
            [
                'id'=>'10',
                'origin_airportid'=>'CXR',
                'arrival_airportid'=>'VDO',
                'skymile'=>'1030',
                'duration'=>'1:40'
            ],
            [
                'id'=>'11',
                'origin_airportid'=>'CXR',
                'arrival_airportid'=>'SGN',
                'skymile'=>'480',
                'duration'=>'1:00'
            ],
            [
                'id'=>'12',
                'origin_airportid'=>'SGN',
                'arrival_airportid'=>'CXR',
                'skymile'=>'480',
                'duration'=>'1:00'
            ],
        ]);
    }
}
