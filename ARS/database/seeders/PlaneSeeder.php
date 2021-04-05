<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planes')->insert([
            [
                'id'=>1,
                'name'=>'Airbus320_MB12020',
                'total_seats'=>132
            ],
            [
                'id'=>2,
                'name'=>'Boeing 787_MB22019',
                'total_seats'=>262
            ],
            [
                'id'=>3,
                'name'=>'Boeing 787_MB52021',
                'total_seats'=>262
            ]
        ]);
    }
}
