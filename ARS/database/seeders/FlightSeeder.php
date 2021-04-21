<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flights')->insert([
           [
               'id'=>'HV111',

               'route_id'=>1,
               'departure_date'=>'2021/5/1 09:30',
               'arrival_date'=>'2021/5/1 11:20',
               'statusid'=>1,
               'planeid'=>2,
           ],
            [
                'id'=>'HV114',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(6,30),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(8,20),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV115',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(16,15) ,
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(18,5),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV116',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(12,0),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(13,50),
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV117',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(16,20),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(18,10),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV118',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(8,15),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(10,05),
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV119',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(13,55),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(16,45),
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV120',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->addDays(4)->setTime(9,0),
                'arrival_date'=>Carbon::today()->addDays(4)->setTime(10,50),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV121',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->addDays(4)->setTime(14,35),
                'arrival_date'=>Carbon::today()->addDays(4)->setTime(16,25),
                'statusid'=>1,
                'planeid'=>2,
            ],

//            ------------------Route SG HN--------------------
            [
                'id'=>'HV112',

                'route_id'=>2,
                'departure_date'=>'2021/5/2 14:10',
                'arrival_date'=>'2021/5/2 16:00',
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV122',
                'route_id'=>2,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(10,20),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(12,10),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV123',
                'route_id'=>2,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(20,30),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(22,30),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV124',

                'route_id'=>2,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(16,0),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(17,50),
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV125',

                'route_id'=>2,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(20,0),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(21,50),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV126',

                'route_id'=>2,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(11,30),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(13,20),
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV127',

                'route_id'=>2,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(17,35),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(19,25),
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV128',

                'route_id'=>2,
                'departure_date'=>Carbon::today()->addDays(4)->setTime(6,0),
                'arrival_date'=>Carbon::today()->addDays(4)->setTime(7,50),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV129',

                'route_id'=>2,
                'departure_date'=>Carbon::today()->addDays(4)->setTime(11,50),
                'arrival_date'=>Carbon::today()->addDays(4)->setTime(13,40),
                'statusid'=>1,
                'planeid'=>2,
            ],

            //            ------------------Route VDO-CXR--------------------
            [
                'id'=>'HV113',

                'route_id'=>9,
                'departure_date'=>'2021/5/2 20:20',
                'arrival_date'=>'2021/5/2 22:00',
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV130',

                'route_id'=>9,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(7,25),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(9,5),
                'statusid'=>1,
                'planeid'=>1,
            ],
//            [
//                'id'=>'HV131',
//
//                'route_id'=>9,
//                'departure_date'=>Carbon::today()->addDays(1)->setTime(10,10),
//                'arrival_date'=>Carbon::today()->addDays(1)->setTime(11,50),
//                'statusid'=>1,
//                'planeid'=>3,
//            ],
            [
                'id'=>'HV132',

                'route_id'=>9,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(16,15),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(17,55),
                'statusid'=>1,
                'planeid'=>3,
            ],
//            [
//                'id'=>'HV133',
//
//                'route_id'=>9,
//                'departure_date'=>Carbon::today()->addDays(2)->setTime(20,50),
//                'arrival_date'=>Carbon::today()->addDays(2)->setTime(21,30),
//                'statusid'=>1,
//                'planeid'=>2,
//            ],
            [
                'id'=>'HV134',

                'route_id'=>9,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(8,0),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(9,40),
                'statusid'=>1,
                'planeid'=>1,
            ],
//            [
//                'id'=>'HV135',
//
//                'route_id'=>9,
//                'departure_date'=>Carbon::today()->addDays(3)->setTime(13,0),
//                'arrival_date'=>Carbon::today()->addDays(3)->setTime(14,40),
//                'statusid'=>1,
//                'planeid'=>2,
//            ],
            [
                'id'=>'HV136',

                'route_id'=>9,
                'departure_date'=>Carbon::today()->addDays(4)->setTime(15,15),
                'arrival_date'=>Carbon::today()->addDays(4)->setTime(16,55),
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV137',

                'route_id'=>9,
                'departure_date'=>Carbon::today()->addDays(4)->setTime(18,5),
                'arrival_date'=>Carbon::today()->addDays(4)->setTime(19,45),
                'statusid'=>1,
                'planeid'=>3,
            ],
            //            ------------------Route--CXR-SGN------------------
            [
                'id'=>'HV138',

                'route_id'=>11,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(10,0),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(11,0),
                'statusid'=>1,
                'planeid'=>3,
            ],
//            [
//                'id'=>'HV139',
//
//                'route_id'=>11,
//                'departure_date'=>Carbon::today()->addDays(1)->setTime(13,0),
//                'arrival_date'=>Carbon::today()->addDays(1)->setTime(14,0),
//                'statusid'=>1,
//                'planeid'=>3,
//            ],
//            [
//                'id'=>'HV140',
//
//                'route_id'=>11,
//                'departure_date'=>Carbon::today()->addDays(2)->setTime(11,45),
//                'arrival_date'=>Carbon::today()->addDays(2)->setTime(12,45),
//                'statusid'=>1,
//                'planeid'=>1,
//            ],
            [
                'id'=>'HV141',

                'route_id'=>11,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(19,30),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(20,30),
                'statusid'=>1,
                'planeid'=>3,
            ],
//            [
//                'id'=>'HV142',
//
//                'route_id'=>11,
//                'departure_date'=>Carbon::today()->addDays(3)->setTime(5,15),
//                'arrival_date'=>Carbon::today()->addDays(3)->setTime(6,15),
//                'statusid'=>1,
//                'planeid'=>3,
//            ],
            [
                'id'=>'HV143',

                'route_id'=>11,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(10,25),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(11,25),
                'statusid'=>1,
                'planeid'=>2,
            ],
//            [
//                'id'=>'HV144',
//
//                'route_id'=>11,
//                'departure_date'=>Carbon::today()->addDays(4)->setTime(9,25),
//                'arrival_date'=>Carbon::today()->addDays(4)->setTime(10,25),
//                'statusid'=>1,
//                'planeid'=>1,
//            ],
            [
                'id'=>'HV145',

                'route_id'=>11,
                'departure_date'=>Carbon::today()->addDays(4)->setTime(17,45),
                'arrival_date'=>Carbon::today()->addDays(4)->setTime(18,45),
                'statusid'=>1,
                'planeid'=>2,
            ],

            //            ------------------Route---SGN-CXR-----------------
//            [
//                'id'=>'HV146',
//
//                'route_id'=>12,
//                'departure_date'=>Carbon::today()->addDays(1)->setTime(15,0),
//                'arrival_date'=>Carbon::today()->addDays(1)->setTime(16,0),
//                'statusid'=>1,
//                'planeid'=>1,
//            ],
            [
                'id'=>'HV147',

                'route_id'=>12,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(8,15),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(9,15),
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV148',

                'route_id'=>12,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(10,0),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(11,0),
                'statusid'=>1,
                'planeid'=>2,
            ],
//            [
//                'id'=>'HV149',
//
//                'route_id'=>12,
//                'departure_date'=>Carbon::today()->addDays(2)->setTime(21,0),
//                'arrival_date'=>Carbon::today()->addDays(2)->setTime(22,0),
//                'statusid'=>1,
//                'planeid'=>3,
//            ],
            [
                'id'=>'HV150',
                'route_id'=>12,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(7,10),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(8,10),
                'statusid'=>1,
                'planeid'=>1,
            ],
//            [
//                'id'=>'HV151',
//
//                'route_id'=>12,
//                'departure_date'=>Carbon::today()->addDays(3)->setTime(12,15),
//                'arrival_date'=>Carbon::today()->addDays(3)->setTime(13,15),
//                'statusid'=>1,
//                'planeid'=>2,
//            ],
            [
                'id'=>'HV152',

                'route_id'=>12,
                'departure_date'=>Carbon::today()->addDays(4)->setTime(9,55),
                'arrival_date'=>Carbon::today()->addDays(4)->setTime(10,55),
                'statusid'=>1,
                'planeid'=>3,
            ],
//            [
//                'id'=>'HV153',
//
//                'route_id'=>12,
//                'departure_date'=>Carbon::today()->addDays(4)->setTime(15,15),
//                'arrival_date'=>Carbon::today()->addDays(4)->setTime(16,15),
//                'statusid'=>1,
//                'planeid'=>2,
//            ],

            //            ------------------Route-CXR-VDO-------------------
//            [
//                'id'=>'HV154',
//
//                'route_id'=>10,
//                'departure_date'=>Carbon::today()->addDays(1)->setTime(6,40),
//                'arrival_date'=>Carbon::today()->addDays(1)->setTime(8,20),
//                'statusid'=>1,
//                'planeid'=>1,
//            ],
            [
                'id'=>'HV155',
                'route_id'=>10,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(15,0),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(16,40),
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV156',
                'route_id'=>10,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(15,10),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(16,50),
                'statusid'=>1,
                'planeid'=>3,
            ],
//            [
//                'id'=>'HV157',
//                'route_id'=>10,
//                'departure_date'=>Carbon::today()->addDays(2)->setTime(21,20),
//                'arrival_date'=>Carbon::today()->addDays(2)->setTime(23,0),
//                'statusid'=>1,
//                'planeid'=>3,
//            ],
            [
                'id'=>'HV158',

                'route_id'=>10,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(10,0),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(11,40),
                'statusid'=>1,
                'planeid'=>3,
            ],
//            [
//                'id'=>'HV159',
//
//                'route_id'=>10,
//                'departure_date'=>Carbon::today()->addDays(3)->setTime(14,55),
//                'arrival_date'=>Carbon::today()->addDays(3)->setTime(15,35),
//                'statusid'=>1,
//                'planeid'=>2,
//            ],
//            [
//                'id'=>'HV160',
//
//                'route_id'=>10,
//                'departure_date'=>Carbon::today()->addDays(4)->setTime(9,15),
//                'arrival_date'=>Carbon::today()->addDays(4)->setTime(10,55),
//                'statusid'=>1,
//                'planeid'=>3,
//            ],
            [
                'id'=>'HV161',

                'route_id'=>10,
                'departure_date'=>Carbon::today()->addDays(4)->setTime(17,35),
                'arrival_date'=>Carbon::today()->addDays(4)->setTime(19,15),
                'statusid'=>1,
                'planeid'=>1,
            ],

            //            ------------------Route--------------------


        ]);
    }
}
