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
               'id'=>'HV',
               'origin_airportid'=>'',
               'transit_airportid'=>'',
               'arrival_airportid'=>'',
               'departure_time'=>'',
               'statusid'=>'',
               'planeid'=>''
           ]
        ]);
    }
}
