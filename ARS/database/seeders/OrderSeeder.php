<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
                'total_price'=>272,
                'total_skymiles'=>3020,
                'flight_route'=>1
            ],
        ]);
    }
}
