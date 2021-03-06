<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
                'flight_id'=>'HV130',
                'seat_location'=>'1A',
                'order_id'=>'SO-MLTK',
                'passenger_id'=>10000106,
                'price'=>57
            ],
            [
                'flight_id'=>'HV138',
                'seat_location'=>'1B',
                'order_id'=>'SO-MLTK',
                'passenger_id'=>10000106,
                'price'=>79
            ],
            [
                'flight_id'=>'HV130',
                'seat_location'=>'2A',
                'order_id'=>'SO-MLTK',
                'passenger_id'=>10000102,
                'price'=>57
            ],
            [
                'flight_id'=>'HV138',
                'seat_location'=>'2B',
                'order_id'=>'SO-MLTK',
                'passenger_id'=>10000102,
                'price'=>79
            ],
        ]);
    }
}
