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
                'name'=>'MB111',
                'plane_type'=>1,
            ],
            [
                'id'=>2,
                'name'=>'MB112',
                'plane_type'=>2,
            ],
            [
                'id'=>3,
                'name'=>'MB113',
                'plane_type'=>2,
            ],
        ]);
    }
}
