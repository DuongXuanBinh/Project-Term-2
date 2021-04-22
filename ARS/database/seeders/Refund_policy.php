<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Refund_policy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('refund_policies')->insert([
            [
                'days_before_departure'=>2,
                'percentage_of_refund'=>'0%',
                'number'=>0,
            ],
            [
                'days_before_departure'=>3,
                'percentage_of_refund'=>'30%',
                'number'=>0.3,
            ],
            [
            'days_before_departure'=>7,
            'percentage_of_refund'=>'50%',
            'number'=>0.5,
            ],
            [
                'days_before_departure'=>15,
                'percentage_of_refund'=>'70%',
                'number'=>0.7,
            ],
            [
                'days_before_departure'=>30,
                'percentage_of_refund'=>'100%',
                'number'=>1,
            ]

        ]);
    }
}
