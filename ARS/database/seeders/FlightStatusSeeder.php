<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
