<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            [
                'id'=>1,
            'name'=>'Buy',
            ],[
                'id'=>2,
            'name'=>'Block',
            ]
        ]);
    }
}
