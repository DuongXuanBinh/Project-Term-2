<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
                'sky_miles'=>1221,
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
                'sky_miles'=>1030,
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
        DB::table('classes')->insert([
            [
                'id'=>1,
                'name'=>'Economy',
                'hand_baggage'=>'7kg',
                'checked_baggage'=>'20kg'
            ],
            [
                'id'=>2,
                'name'=>'Business',
                'hand_baggage'=>'10kg',
                'checked_baggage'=>'40kg'
            ]
        ]);
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
        DB::table('customer_types')->insert([
            [
                'id'=>1,
                'name'=>'Children',
                'min_age'=>0,
                'max_age'=>10,
                'fare_diff'=>0.6
            ],
            [
                'id'=>2,
                'name'=>'Aldult',
                'min_age'=>11,
                'max_age'=>65,
                'fare_diff'=>1.0
            ],
            [
                'id'=>3,
                'name'=>'Senior citizen',
                'min_age'=>66,
                'max_age'=>200,
                'fare_diff'=>0.8
            ]
        ]);
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
                'departure_date'=>Carbon::today()->setTime(6,30),
                'arrival_date'=>Carbon::today()->setTime(8,20),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV115',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->setTime(16,15) ,
                'arrival_date'=>Carbon::today()->setTime(18,5),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV116',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(12,0),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(13,50),
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV117',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(16,20),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(18,10),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV118',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(8,15),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(10,05),
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV119',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(13,55),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(16,45),
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV120',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(9,0),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(10,50),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV121',

                'route_id'=>1,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(14,35),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(16,25),
                'statusid'=>1,
                'planeid'=>2,
            ],

//            ------------------Route SG HN--------------------
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
                'departure_date'=>Carbon::today()->setTime(10,20),
                'arrival_date'=>Carbon::today()->setTime(12,10),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV123',
                'route_id'=>2,
                'departure_date'=>Carbon::today()->setTime(20,30),
                'arrival_date'=>Carbon::today()->setTime(22,30),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV124',

                'route_id'=>2,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(16,0),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(17,50),
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV125',

                'route_id'=>2,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(20,0),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(21,50),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV126',

                'route_id'=>2,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(11,30),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(13,20),
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV127',

                'route_id'=>2,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(17,35),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(19,25),
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV128',

                'route_id'=>2,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(6,0),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(7,50),
                'statusid'=>1,
                'planeid'=>2,
            ],
            [
                'id'=>'HV129',

                'route_id'=>2,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(11,50),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(13,40),
                'statusid'=>1,
                'planeid'=>2,
            ],

            //            ------------------Route VDO-CXR--------------------
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
                'departure_date'=>Carbon::today()->setTime(7,25),
                'arrival_date'=>Carbon::today()->setTime(9,5),
                'statusid'=>1,
                'planeid'=>1,
            ],
//            [
//                'id'=>'HV131',
//
//                'route_id'=>9,
//                'departure_date'=>Carbon::today()->setTime(10,10),
//                'arrival_date'=>Carbon::today()->setTime(11,50),
//                'statusid'=>1,
//                'planeid'=>3,
//            ],
            [
                'id'=>'HV132',

                'route_id'=>9,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(16,15),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(17,55),
                'statusid'=>1,
                'planeid'=>3,
            ],
//            [
//                'id'=>'HV133',
//
//                'route_id'=>9,
//                'departure_date'=>Carbon::today()->addDays(1)->setTime(20,50),
//                'arrival_date'=>Carbon::today()->addDays(1)->setTime(21,30),
//                'statusid'=>1,
//                'planeid'=>2,
//            ],
            [
                'id'=>'HV134',

                'route_id'=>9,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(8,0),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(9,40),
                'statusid'=>1,
                'planeid'=>1,
            ],
//            [
//                'id'=>'HV135',
//
//                'route_id'=>9,
//                'departure_date'=>Carbon::today()->addDays(2)->setTime(13,0),
//                'arrival_date'=>Carbon::today()->addDays(2)->setTime(14,40),
//                'statusid'=>1,
//                'planeid'=>2,
//            ],
            [
                'id'=>'HV136',

                'route_id'=>9,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(15,15),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(16,55),
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV137',

                'route_id'=>9,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(18,5),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(19,45),
                'statusid'=>1,
                'planeid'=>3,
            ],
            //            ------------------Route--CXR-SGN------------------
            [
                'id'=>'HV138',

                'route_id'=>11,
                'departure_date'=>Carbon::today()->setTime(10,0),
                'arrival_date'=>Carbon::today()->setTime(11,0),
                'statusid'=>1,
                'planeid'=>3,
            ],
//            [
//                'id'=>'HV139',
//
//                'route_id'=>11,
//                'departure_date'=>Carbon::today()->setTime(13,0),
//                'arrival_date'=>Carbon::today()->setTime(14,0),
//                'statusid'=>1,
//                'planeid'=>3,
//            ],
//            [
//                'id'=>'HV140',
//
//                'route_id'=>11,
//                'departure_date'=>Carbon::today()->addDays(1)->setTime(11,45),
//                'arrival_date'=>Carbon::today()->addDays(1)->setTime(12,45),
//                'statusid'=>1,
//                'planeid'=>1,
//            ],
            [
                'id'=>'HV141',

                'route_id'=>11,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(19,30),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(20,30),
                'statusid'=>1,
                'planeid'=>3,
            ],
//            [
//                'id'=>'HV142',
//
//                'route_id'=>11,
//                'departure_date'=>Carbon::today()->addDays(2)->setTime(5,15),
//                'arrival_date'=>Carbon::today()->addDays(2)->setTime(6,15),
//                'statusid'=>1,
//                'planeid'=>3,
//            ],
            [
                'id'=>'HV143',

                'route_id'=>11,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(10,25),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(11,25),
                'statusid'=>1,
                'planeid'=>2,
            ],
//            [
//                'id'=>'HV144',
//
//                'route_id'=>11,
//                'departure_date'=>Carbon::today()->addDays(3)->setTime(9,25),
//                'arrival_date'=>Carbon::today()->addDays(3)->setTime(10,25),
//                'statusid'=>1,
//                'planeid'=>1,
//            ],
            [
                'id'=>'HV145',

                'route_id'=>11,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(17,45),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(18,45),
                'statusid'=>1,
                'planeid'=>2,
            ],

            //            ------------------Route---SGN-CXR-----------------
//            [
//                'id'=>'HV146',
//
//                'route_id'=>12,
//                'departure_date'=>Carbon::today()->setTime(15,0),
//                'arrival_date'=>Carbon::today()->setTime(16,0),
//                'statusid'=>1,
//                'planeid'=>1,
//            ],
            [
                'id'=>'HV147',

                'route_id'=>12,
                'departure_date'=>Carbon::today()->setTime(8,15),
                'arrival_date'=>Carbon::today()->setTime(9,15),
                'statusid'=>1,
                'planeid'=>3,
            ],
            [
                'id'=>'HV148',

                'route_id'=>12,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(10,0),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(11,0),
                'statusid'=>1,
                'planeid'=>2,
            ],
//            [
//                'id'=>'HV149',
//
//                'route_id'=>12,
//                'departure_date'=>Carbon::today()->addDays(1)->setTime(21,0),
//                'arrival_date'=>Carbon::today()->addDays(1)->setTime(22,0),
//                'statusid'=>1,
//                'planeid'=>3,
//            ],
            [
                'id'=>'HV150',
                'route_id'=>12,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(7,10),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(8,10),
                'statusid'=>1,
                'planeid'=>1,
            ],
//            [
//                'id'=>'HV151',
//
//                'route_id'=>12,
//                'departure_date'=>Carbon::today()->addDays(2)->setTime(12,15),
//                'arrival_date'=>Carbon::today()->addDays(2)->setTime(13,15),
//                'statusid'=>1,
//                'planeid'=>2,
//            ],
            [
                'id'=>'HV152',

                'route_id'=>12,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(9,55),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(10,55),
                'statusid'=>1,
                'planeid'=>3,
            ],
//            [
//                'id'=>'HV153',
//
//                'route_id'=>12,
//                'departure_date'=>Carbon::today()->addDays(3)->setTime(15,15),
//                'arrival_date'=>Carbon::today()->addDays(3)->setTime(16,15),
//                'statusid'=>1,
//                'planeid'=>2,
//            ],

            //            ------------------Route-CXR-VDO-------------------
//            [
//                'id'=>'HV154',
//
//                'route_id'=>10,
//                'departure_date'=>Carbon::today()->setTime(6,40),
//                'arrival_date'=>Carbon::today()->setTime(8,20),
//                'statusid'=>1,
//                'planeid'=>1,
//            ],
            [
                'id'=>'HV155',
                'route_id'=>10,
                'departure_date'=>Carbon::today()->setTime(15,0),
                'arrival_date'=>Carbon::today()->setTime(16,40),
                'statusid'=>1,
                'planeid'=>1,
            ],
            [
                'id'=>'HV156',
                'route_id'=>10,
                'departure_date'=>Carbon::today()->addDays(1)->setTime(15,10),
                'arrival_date'=>Carbon::today()->addDays(1)->setTime(16,50),
                'statusid'=>1,
                'planeid'=>3,
            ],
//            [
//                'id'=>'HV157',
//                'route_id'=>10,
//                'departure_date'=>Carbon::today()->addDays(1)->setTime(21,20),
//                'arrival_date'=>Carbon::today()->addDays(1)->setTime(23,0),
//                'statusid'=>1,
//                'planeid'=>3,
//            ],
            [
                'id'=>'HV158',

                'route_id'=>10,
                'departure_date'=>Carbon::today()->addDays(2)->setTime(10,0),
                'arrival_date'=>Carbon::today()->addDays(2)->setTime(11,40),
                'statusid'=>1,
                'planeid'=>3,
            ],
//            [
//                'id'=>'HV159',
//
//                'route_id'=>10,
//                'departure_date'=>Carbon::today()->addDays(2)->setTime(14,55),
//                'arrival_date'=>Carbon::today()->addDays(2)->setTime(15,35),
//                'statusid'=>1,
//                'planeid'=>2,
//            ],
//            [
//                'id'=>'HV160',
//
//                'route_id'=>10,
//                'departure_date'=>Carbon::today()->addDays(3)->setTime(9,15),
//                'arrival_date'=>Carbon::today()->addDays(3)->setTime(10,55),
//                'statusid'=>1,
//                'planeid'=>3,
//            ],
            [
                'id'=>'HV161',

                'route_id'=>10,
                'departure_date'=>Carbon::today()->addDays(3)->setTime(17,35),
                'arrival_date'=>Carbon::today()->addDays(3)->setTime(19,15),
                'statusid'=>1,
                'planeid'=>1,
            ],

            //            ------------------Route--------------------


        ]);
        DB::table('flight_statuses')->insert([
            [
                'id'=>1,
                'name'=>'As scheduled'
            ],
            [
                'id'=>2,
                'name'=>'Delayed'
            ],
            [
                'id'=>3,
                'name'=>'Cancelled'
            ],
            [
                'id'=>4,
                'name'=>'Landed'
            ]
        ]);
        DB::table('orders')->insert([
            [
                'id'=>'SO-AKEB',
                'account_id'=>1,
                'order_status'=>1,
                'total_price'=>'191',
                'total_skymiles'=>4884,
                'flight_route'=>2
            ],
            [
                'id'=>'SO-HTBN',
                'account_id'=>2,
                'order_status'=>1,
                'total_price'=>'90',
                'total_skymiles'=>2442,
                'flight_route'=>1
            ],
            [
                'id'=>'SO-MLTK',
                'account_id'=>3,
                'order_status'=>1,
                'total_price'=>52,
                'total_skymiles'=>1030,
                'flight_route'=>1
            ],
        ]);
        DB::table('planes')->insert([
            [
                'id'=>1,
                'name'=>'MB111',
                'plane_type'=>1
            ],
            [
                'id'=>2,
                'name'=>'MB112',
                'plane_type'=>2
            ],
            [
                'id'=>3,
                'name'=>'MB113',
                'plane_type'=>2
            ]
        ]);
        DB::table('plane_types')->insert([
            [
                'id'=>1,
                'name'=>'Airbus 320_200',
                'business_seats'=>16,
                'economy_seats'=>126,
                'total_seats'=>142
            ],
            [
                'id'=>2,
                'name'=>'Boeing 787-800',
                'business_seats'=>28,
                'economy_seats'=>207,
                'total_seats'=>235,
            ]
        ]);
        DB::table('roles')->insert([
            [
                'id'=>1,
                'name'=>'passenger'
            ],
            [
                'id'=>2,
                'name'=>'admin'
            ]
        ]);
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
        DB::table('seats')->insert([
            //320
            [ 'seat_location'=>'1A', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'1B', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'1C', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'1D', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'2A', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'2B', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'2C', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'2D', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'3A', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'3B', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'3C', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'3D', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'4A', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'4B', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'4C', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'4D', 'class_id'=>2, 'plane_type'=>1 ],
            [ 'seat_location'=>'5A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'5B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'5C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'5D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'5E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'5G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'6A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'6B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'6C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'6D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'6E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'6G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'7A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'7B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'7C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'7D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'7E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'7G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'8A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'8B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'8C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'8D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'8E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'8G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'9A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'9B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'9C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'9D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'9E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'9G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'10A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'10B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'10C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'10D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'10E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'10G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'11A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'11B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'11C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'11D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'11E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'11G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'12A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'12B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'12C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'12D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'12E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'12G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'13A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'13B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'13C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'13D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'13E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'13G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'14A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'14B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'14C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'14D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'14E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'14G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'15A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'15B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'15C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'15D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'15E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'15G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'16A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'16B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'16C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'16D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'16E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'16G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'17A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'17B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'17C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'17D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'17E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'17G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'18A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'18B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'18C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'18D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'18E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'18G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'19A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'19B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'19C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'19D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'19E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'19G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'20A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'20B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'20C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'20D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'20E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'20G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'21A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'21B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'21C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'21D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'21E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'21G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'22A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'22B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'22C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'22D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'22E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'22G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'23A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'23B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'23C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'23D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'23E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'23G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'24A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'24B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'24C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'24D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'24E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'24G', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'25A', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'25B', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'25C', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'25D', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'25E', 'class_id'=>1, 'plane_type'=>1 ],
            [ 'seat_location'=>'25G', 'class_id'=>1, 'plane_type'=>1 ],
            //787-1
            [ 'seat_location'=>'1A', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'1B', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'1C', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'1D', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'2A', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'2B', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'2C', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'2D', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'3A', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'3B', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'3C', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'3D', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'4A', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'4B', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'4C', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'4D', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'5A', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'5B', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'5C', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'5D', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'6A', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'6B', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'6C', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'6D', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'7A', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'7B', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'7C', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'7D', 'class_id'=>2, 'plane_type'=>2 ],
            [ 'seat_location'=>'8A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'8B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'8C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'8D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'8E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'8F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'8G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'8H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'8K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'9A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'9B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'9C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'9D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'9E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'9F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'9G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'9H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'9K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'10A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'10B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'10C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'10D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'10E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'10F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'10G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'10H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'10K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'11A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'11B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'11C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'11D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'11E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'11F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'11G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'11H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'11K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'12A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'12B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'12C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'12D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'12E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'12F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'12G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'12H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'12K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'13A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'13B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'13C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'13D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'13E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'13F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'13G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'13H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'13K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'14A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'14B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'14C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'14D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'14E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'14F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'14G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'14H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'14K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'15A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'15B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'15C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'15D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'15E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'15F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'15G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'15H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'15K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'16A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'16B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'16C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'16D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'16E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'16F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'16G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'16H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'16K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'17A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'17B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'17C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'17D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'17E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'17F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'17G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'17H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'17K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'18A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'18B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'18C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'18D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'18E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'18F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'18G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'18H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'18K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'19A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'19B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'19C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'19D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'19E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'19F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'19G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'19H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'19K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'20A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'20B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'20C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'20D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'20E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'20F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'20G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'20H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'20K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'21A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'21B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'21C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'21D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'21E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'21F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'21G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'21H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'21K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'22A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'22B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'22C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'22D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'22E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'22F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'22G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'22H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'22K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'23A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'23B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'23C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'23D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'23E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'23F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'23G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'23H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'23K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'24A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'24B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'24C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'24D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'24E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'24F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'24G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'24H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'24K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'25A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'25B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'25C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'25D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'25E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'25F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'25G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'25H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'25K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'26A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'26B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'26C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'26D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'26E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'26F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'26G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'26H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'26K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'27A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'27B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'27C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'27D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'27E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'27F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'27G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'27H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'27K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'28A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'28B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'28C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'28D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'28E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'28F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'28G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'28H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'28K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'29A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'29B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'29C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'29D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'29E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'29F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'29G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'29H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'29K', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'30A', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'30B', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'30C', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'30D', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'30E', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'30F', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'30G', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'30H', 'class_id'=>1, 'plane_type'=>2 ],
            [ 'seat_location'=>'30K', 'class_id'=>1, 'plane_type'=>2 ],

        ]);
        DB::table('ticket_details')->insert([
            [
                'flight_id'=>'HV111',
                'seat_location'=>'10A',
                'order_id'=>'SO-AKEB',
                'passenger_id'=>10000104,
                'price'=>50.5
            ],
            [
                'flight_id'=>'HV111',
                'seat_location'=>'10B',
                'order_id'=>'SO-AKEB',
                'passenger_id'=>10000101,
                'price'=>50.5
            ],
            [
                'flight_id'=>'HV112',
                'seat_location'=>'10C',
                'order_id'=>'SO-AKEB',
                'passenger_id'=>10000104,
                'price'=>45
            ],
            [
                'flight_id'=>'HV112',
                'seat_location'=>'14C',
                'order_id'=>'SO-AKEB',
                'passenger_id'=>10000101,
                'price'=>45
            ],
            [
                'flight_id'=>'HV112',
                'seat_location'=>'24C',
                'order_id'=>'SO-HTBN',
                'passenger_id'=>10000105,
                'price'=>45
            ],
            [
                'flight_id'=>'HV112',
                'seat_location'=>'15A',
                'order_id'=>'SO-HTBN',
                'passenger_id'=>10000103,
                'price'=>45
            ],
            [
                'flight_id'=>'HV113',
                'seat_location'=>'1A',
                'order_id'=>'SO-MLTK',
                'passenger_id'=>1000106,
                'price'=>52
            ],

        ]);
        DB::table('ticket_prices')->insert([
            [
                'flight_id'=>'HV111',
                'class_id'=>1,
                'price'=>50.5,
            ],
            [
                'flight_id'=>'HV111',
                'class_id'=>2,
                'price'=>71.3,
            ],
            [
                'flight_id'=>'HV112',
                'class_id'=>1,
                'price'=>45,
            ],
            [
                'flight_id'=>'HV112',
                'class_id'=>2,
                'price'=>68.9,
            ],
            [
                'flight_id'=>'HV113',
                'class_id'=>1,
                'price'=>39,
            ],
            [
                'flight_id'=>'HV113',
                'class_id'=>2,
                'price'=>52,
            ],
            ['flight_id'=>'HV114', 'class_id'=>1, 'price'=>80 ],
            ['flight_id'=>'HV114', 'class_id'=>2, 'price'=>104 ],
            ['flight_id'=>'HV115', 'class_id'=>1, 'price'=>82 ],
            ['flight_id'=>'HV115', 'class_id'=>2, 'price'=>97 ],
            ['flight_id'=>'HV116', 'class_id'=>1, 'price'=>34 ],
            ['flight_id'=>'HV116', 'class_id'=>2, 'price'=>60 ],
            ['flight_id'=>'HV117', 'class_id'=>1, 'price'=>98 ],
            ['flight_id'=>'HV117', 'class_id'=>2, 'price'=>117 ],
            ['flight_id'=>'HV118', 'class_id'=>1, 'price'=>76 ],
            ['flight_id'=>'HV118', 'class_id'=>2, 'price'=>87 ],
            ['flight_id'=>'HV119', 'class_id'=>1, 'price'=>32 ],
            ['flight_id'=>'HV119', 'class_id'=>2, 'price'=>58 ],
            ['flight_id'=>'HV120', 'class_id'=>1, 'price'=>47 ],
            ['flight_id'=>'HV120', 'class_id'=>2, 'price'=>71 ],
            ['flight_id'=>'HV121', 'class_id'=>1, 'price'=>93 ],
            ['flight_id'=>'HV121', 'class_id'=>2, 'price'=>110 ],
            ['flight_id'=>'HV122', 'class_id'=>1, 'price'=>68 ],
            ['flight_id'=>'HV122', 'class_id'=>2, 'price'=>84 ],
            ['flight_id'=>'HV123', 'class_id'=>1, 'price'=>93 ],
            ['flight_id'=>'HV123', 'class_id'=>2, 'price'=>115 ],
            ['flight_id'=>'HV124', 'class_id'=>1, 'price'=>74 ],
            ['flight_id'=>'HV124', 'class_id'=>2, 'price'=>91 ],
            ['flight_id'=>'HV125', 'class_id'=>1, 'price'=>72 ],
            ['flight_id'=>'HV125', 'class_id'=>2, 'price'=>82 ],
            ['flight_id'=>'HV126', 'class_id'=>1, 'price'=>44 ],
            ['flight_id'=>'HV126', 'class_id'=>2, 'price'=>57 ],
            ['flight_id'=>'HV127', 'class_id'=>1, 'price'=>69 ],
            ['flight_id'=>'HV127', 'class_id'=>2, 'price'=>88 ],
            ['flight_id'=>'HV128', 'class_id'=>1, 'price'=>32 ],
            ['flight_id'=>'HV128', 'class_id'=>2, 'price'=>59 ],
            ['flight_id'=>'HV129', 'class_id'=>1, 'price'=>50 ],
            ['flight_id'=>'HV129', 'class_id'=>2, 'price'=>67 ],
            ['flight_id'=>'HV130', 'class_id'=>1, 'price'=>38 ],
            ['flight_id'=>'HV130', 'class_id'=>2, 'price'=>57 ],
            ['flight_id'=>'HV131', 'class_id'=>1, 'price'=>52 ],
            ['flight_id'=>'HV131', 'class_id'=>2, 'price'=>65 ],
            ['flight_id'=>'HV132', 'class_id'=>1, 'price'=>75 ],
            ['flight_id'=>'HV132', 'class_id'=>2, 'price'=>91 ],
            ['flight_id'=>'HV133', 'class_id'=>1, 'price'=>99 ],
            ['flight_id'=>'HV133', 'class_id'=>2, 'price'=>111 ],
            ['flight_id'=>'HV134', 'class_id'=>1, 'price'=>84 ],
            ['flight_id'=>'HV134', 'class_id'=>2, 'price'=>105 ],
            ['flight_id'=>'HV135', 'class_id'=>1, 'price'=>71 ],
            ['flight_id'=>'HV135', 'class_id'=>2, 'price'=>96 ],
            ['flight_id'=>'HV136', 'class_id'=>1, 'price'=>76 ],
            ['flight_id'=>'HV136', 'class_id'=>2, 'price'=>103 ],
            ['flight_id'=>'HV137', 'class_id'=>1, 'price'=>75 ],
            ['flight_id'=>'HV137', 'class_id'=>2, 'price'=>101 ],
            ['flight_id'=>'HV138', 'class_id'=>1, 'price'=>60 ],
            ['flight_id'=>'HV138', 'class_id'=>2, 'price'=>79 ],
            ['flight_id'=>'HV139', 'class_id'=>1, 'price'=>55 ],
            ['flight_id'=>'HV139', 'class_id'=>2, 'price'=>76 ],
            ['flight_id'=>'HV140', 'class_id'=>1, 'price'=>39 ],
            ['flight_id'=>'HV140', 'class_id'=>2, 'price'=>62 ],
            ['flight_id'=>'HV141', 'class_id'=>1, 'price'=>36 ],
            ['flight_id'=>'HV141', 'class_id'=>2, 'price'=>47 ],
            ['flight_id'=>'HV142', 'class_id'=>1, 'price'=>83 ],
            ['flight_id'=>'HV142', 'class_id'=>2, 'price'=>98 ],
            ['flight_id'=>'HV143', 'class_id'=>1, 'price'=>34 ],
            ['flight_id'=>'HV143', 'class_id'=>2, 'price'=>54 ],
            ['flight_id'=>'HV144', 'class_id'=>1, 'price'=>84 ],
            ['flight_id'=>'HV144', 'class_id'=>2, 'price'=>104 ],
            ['flight_id'=>'HV145', 'class_id'=>1, 'price'=>77 ],
            ['flight_id'=>'HV145', 'class_id'=>2, 'price'=>97 ],
            ['flight_id'=>'HV146', 'class_id'=>1, 'price'=>61 ],
            ['flight_id'=>'HV146', 'class_id'=>2, 'price'=>85 ],
            ['flight_id'=>'HV147', 'class_id'=>1, 'price'=>50 ],
            ['flight_id'=>'HV147', 'class_id'=>2, 'price'=>78 ],
            ['flight_id'=>'HV148', 'class_id'=>1, 'price'=>80 ],
            ['flight_id'=>'HV148', 'class_id'=>2, 'price'=>91 ],
            ['flight_id'=>'HV149', 'class_id'=>1, 'price'=>24 ],
            ['flight_id'=>'HV149', 'class_id'=>2, 'price'=>49 ],
            ['flight_id'=>'HV150', 'class_id'=>1, 'price'=>74 ],
            ['flight_id'=>'HV150', 'class_id'=>2, 'price'=>87 ],
            ['flight_id'=>'HV151', 'class_id'=>1, 'price'=>92 ],
            ['flight_id'=>'HV151', 'class_id'=>2, 'price'=>116 ],
            ['flight_id'=>'HV152', 'class_id'=>1, 'price'=>68 ],
            ['flight_id'=>'HV152', 'class_id'=>2, 'price'=>78 ],
            ['flight_id'=>'HV153', 'class_id'=>1, 'price'=>76 ],
            ['flight_id'=>'HV153', 'class_id'=>2, 'price'=>101 ],
            ['flight_id'=>'HV154', 'class_id'=>1, 'price'=>43 ],
            ['flight_id'=>'HV154', 'class_id'=>2, 'price'=>71 ],
            ['flight_id'=>'HV155', 'class_id'=>1, 'price'=>23 ],
            ['flight_id'=>'HV155', 'class_id'=>2, 'price'=>40 ],
            ['flight_id'=>'HV156', 'class_id'=>1, 'price'=>26 ],
            ['flight_id'=>'HV156', 'class_id'=>2, 'price'=>38 ],
            ['flight_id'=>'HV157', 'class_id'=>1, 'price'=>27 ],
            ['flight_id'=>'HV157', 'class_id'=>2, 'price'=>47 ],
            ['flight_id'=>'HV158', 'class_id'=>1, 'price'=>90 ],
            ['flight_id'=>'HV158', 'class_id'=>2, 'price'=>101 ],
            ['flight_id'=>'HV159', 'class_id'=>1, 'price'=>84 ],
            ['flight_id'=>'HV159', 'class_id'=>2, 'price'=>110 ],
            ['flight_id'=>'HV160', 'class_id'=>1, 'price'=>65 ],
            ['flight_id'=>'HV160', 'class_id'=>2, 'price'=>76 ],
            ['flight_id'=>'HV161', 'class_id'=>1, 'price'=>95 ],
            ['flight_id'=>'HV161', 'class_id'=>2, 'price'=>108 ],
        ]);
        DB::table('order_statuses')->insert([
            [
                'id'=>1,
                'name'=>'Buyed',
            ],[
                'id'=>2,
                'name'=>'Blocked',
            ],
            [
                'id'=>3,
                'name'=>'Cancelled'
            ]
        ]);
    }
}
