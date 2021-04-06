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
                'total_price'=>'151.5',
                'total_skymiles'=>3663,
            ],
            [
                'id'=>'SO-HTBN',
                'account_id'=>2,
                'order_status'=>1,
                'total_price'=>'90',
                'total_skymiles'=>2442,
            ],
            [
                'id'=>'SO-MLTK',
                'account_id'=>3,
                'order_status'=>1,
                'total_price'=>52,
                'total_skymiles'=>1030,
            ],
        ]);
    }
}
