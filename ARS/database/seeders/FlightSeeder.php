<?php

namespace Database\Seeders;

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
               'departure_date'=>'2021/4/1 09:30',
               'arrival_date'=>'2021/4/1 11:20',
               'statusid'=>4,
               'planeid'=>2,
           ],
            [
                'id'=>'HV114',

                'route_id'=>1,
                'departure_date'=>'2021/4/7 6:30',
                'arrival_date'=>'2021/4/7 08:20',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV115',

                'route_id'=>1,
                'departure_date'=>'2021/4/7 16:15',
                'arrival_date'=>'2021/4/7 18:05',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV116',

                'route_id'=>1,
                'departure_date'=>'2021/4/8 12:00',
                'arrival_date'=>'2021/4/8 13:50',
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV117',

                'route_id'=>1,
                'departure_date'=>'2021/4/8 16:20',
                'arrival_date'=>'2021/4/8 18:10',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV118',

                'route_id'=>1,
                'departure_date'=>'2021/4/9 08:15',
                'arrival_date'=>'2021/4/9 10:05',
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV119',

                'route_id'=>1,
                'departure_date'=>'2021/4/9 13:55',
                'arrival_date'=>'2021/4/9 16:45',
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV120',

                'route_id'=>1,
                'departure_date'=>'2021/4/10 9:00',
                'arrival_date'=>'2021/4/10 10:50',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV121',

                'route_id'=>1,
                'departure_date'=>'2021/4/10 14:35',
                'arrival_date'=>'2021/4/10 16:25',
                'statusid'=>1,
                'planeid'=>2,
            ],

//            ------------------Route--------------------
            [
                'id'=>'HV112',

                'route_id'=>2,
                'departure_date'=>'2021/4/2 14:10',
                'arrival_date'=>'2021/4/2 16:00',
                'statusid'=>4,
                'planeid'=>1,
            ],
            [
                'id'=>'HV122',

                'route_id'=>2,
                'departure_date'=>'2021/4/7 10:20',
                'arrival_date'=>'2021/4/7 12:10',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV123',

                'route_id'=>2,
                'departure_date'=>'2021/4/7 20:30',
                'arrival_date'=>'2021/4/7 22:30',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV124',

                'route_id'=>2,
                'departure_date'=>'2021/4/8 16:00',
                'arrival_date'=>'2021/4/8 17:50',
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV125',

                'route_id'=>2,
                'departure_date'=>'2021/4/8 20:00',
                'arrival_date'=>'2021/4/8 21:50',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV126',

                'route_id'=>2,
                'departure_date'=>'2021/4/9 11:30',
                'arrival_date'=>'2021/4/9 13:20',
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV127',

                'route_id'=>2,
                'departure_date'=>'2021/4/9 17:35',
                'arrival_date'=>'2021/4/9 19:25',
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV128',

                'route_id'=>2,
                'departure_date'=>'2021/4/10 06:00',
                'arrival_date'=>'2021/4/10 07:50',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV129',

                'route_id'=>2,
                'departure_date'=>'2021/4/10 11:50',
                'arrival_date'=>'2021/4/10 13:40',
                'statusid'=>1,
                'planeid'=>2,
            ],

            //            ------------------Route--------------------
            [
                'id'=>'HV113',

                'route_id'=>9,
                'departure_date'=>'2021/4/2 20:20',
                'arrival_date'=>'2021/4/2 22:00',
                'statusid'=>4,
                'planeid'=>1,
            ],
            [
                'id'=>'HV130',

                'route_id'=>9,
                'departure_date'=>'2021/4/7 7:25',
                'arrival_date'=>'2021/4/7 9:05',
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV131',

                'route_id'=>9,
                'departure_date'=>'2021/4/7 10:10',
                'arrival_date'=>'2021/4/7 11:50',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV132',

                'route_id'=>9,
                'departure_date'=>'2021/4/8 16:15',
                'arrival_date'=>'2021/4/8 17:55',
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV133',

                'route_id'=>9,
                'departure_date'=>'2021/4/8 20:50',
                'arrival_date'=>'2021/4/8 21:30',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV134',

                'route_id'=>9,
                'departure_date'=>'2021/4/9 8:00',
                'arrival_date'=>'2021/4/9 9:40',
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV135',

                'route_id'=>9,
                'departure_date'=>'2021/4/9 13:00',
                'arrival_date'=>'2021/4/9 14:40',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV136',

                'route_id'=>9,
                'departure_date'=>'2021/4/10 15:15',
                'arrival_date'=>'2021/4/10 16:55',
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV137',

                'route_id'=>9,
                'departure_date'=>'2021/4/10 18:05',
                'arrival_date'=>'2021/4/10 19:45',
                'statusid'=>1,
                'planeid'=>3,
            ],
            //            ------------------Route--------------------
            [
                'id'=>'HV138',

                'route_id'=>11,
                'departure_date'=>'2021/4/7 10:00',
                'arrival_date'=>'2021/4/7 11:00',
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV139',

                'route_id'=>11,
                'departure_date'=>'2021/4/7 13:00',
                'arrival_date'=>'2021/4/7 14:00',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV140',

                'route_id'=>11,
                'departure_date'=>'2021/4/8 11:45',
                'arrival_date'=>'2021/4/8 12:45',
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV141',

                'route_id'=>11,
                'departure_date'=>'2021/4/8 19:30',
                'arrival_date'=>'2021/4/8 20:30',
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV142',

                'route_id'=>11,
                'departure_date'=>'2021/4/9 5:15',
                'arrival_date'=>'2021/4/9 6:15',
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV143',

                'route_id'=>11,
                'departure_date'=>'2021/4/9 10:15',
                'arrival_date'=>'2021/4/9 11:15',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV144',

                'route_id'=>11,
                'departure_date'=>'2021/4/10 9:25',
                'arrival_date'=>'2021/4/10 10:25',
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV145',

                'route_id'=>11,
                'departure_date'=>'2021/4/10 16:35',
                'arrival_date'=>'2021/4/10 17:35',
                'statusid'=>1,
                'planeid'=>2,
            ],

            //            ------------------Route--------------------
            [
                'id'=>'HV146',

                'route_id'=>12,
                'departure_date'=>'2021/4/7 15:00',
                'arrival_date'=>'2021/4/7 16:00',
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV147',

                'route_id'=>12,
                'departure_date'=>'2021/4/7 08:15',
                'arrival_date'=>'2021/4/7 09:15',
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV148',

                'route_id'=>12,
                'departure_date'=>'2021/4/8 10:00',
                'arrival_date'=>'2021/4/8 11:00',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV149',

                'route_id'=>12,
                'departure_date'=>'2021/4/8 21:00',
                'arrival_date'=>'2021/4/8 22:00',
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV150',

                'route_id'=>12,
                'departure_date'=>'2021/4/9 07:10',
                'arrival_date'=>'2021/4/9 08:10',
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV151',

                'route_id'=>12,
                'departure_date'=>'2021/4/9 12:15',
                'arrival_date'=>'2021/4/9 13:15',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV152',

                'route_id'=>12,
                'departure_date'=>'2021/4/10 9:55',
                'arrival_date'=>'2021/4/10 10:55',
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV153',

                'route_id'=>12,
                'departure_date'=>'2021/4/10 15:15',
                'arrival_date'=>'2021/4/10 16:15',
                'statusid'=>1,
                'planeid'=>2,
            ],

            //            ------------------Route--------------------
            [
                'id'=>'HV154',

                'route_id'=>10,
                'departure_date'=>'2021/4/7 6:40',
                'arrival_date'=>'2021/4/7 8:20',
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV155',

                'route_id'=>10,
                'departure_date'=>'2021/4/7 10:00',
                'arrival_date'=>'2021/4/7 11:40',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV156',

                'route_id'=>10,
                'departure_date'=>'2021/4/8 15:10',
                'arrival_date'=>'2021/4/8 16:50',
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV157',

                'route_id'=>10,
                'departure_date'=>'2021/4/8 21:20',
                'arrival_date'=>'2021/4/8 23:00',
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV158',

                'route_id'=>10,
                'departure_date'=>'2021/4/9 10:00',
                'arrival_date'=>'2021/4/9 11:40',
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV159',

                'route_id'=>10,
                'departure_date'=>'2021/4/9 14:55',
                'arrival_date'=>'2021/4/9 15:35',
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV160',

                'route_id'=>10,
                'departure_date'=>'2021/4/10 9:15',
                'arrival_date'=>'2021/4/10 10:55',
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV161',

                'route_id'=>10,
                'departure_date'=>'2021/4/10 17:35',
                'arrival_date'=>'2021/4/10 19:15',
                'statusid'=>1,
                'planeid'=>1,
            ],
            //            ------------------Route--------------------


        ]);
    }
}
