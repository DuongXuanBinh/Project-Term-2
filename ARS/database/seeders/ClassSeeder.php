<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            [
                'id'=>1,
                'name'=>'Economy',
                'hand_baggage'=>'7kg',
                'checked_baggage'=>'20kg'
            ],
            [
                'id'=>2,
                'name'=>'Business',
                'hand_baggage'=>'10kg',
                'checked_baggage'=>'40kg'
            ]
        ]);
    }
}
