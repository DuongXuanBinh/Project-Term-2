<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaneTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plane_types')->insert([
            [
                'id'=>1,
                'name'=>'Airbus 320_200',
                'total_seats'=>142
            ],
            [
                'id'=>2,
                'name'=>'Boeing 787-800',
                'total_seats'=>235,
            ]
        ]);
    }
}
