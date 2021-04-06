<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
