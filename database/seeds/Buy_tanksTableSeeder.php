<?php

use Illuminate\Database\Seeder;

class Buy_tanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'tank_buys';

        DB::table($table)->delete();
        $data = [
            [
                'tank_id' => '1',
                'maker' => 'Mannesmann',
                'thread_type' => '25x200 6H ISO',
                'date' => '1996-10-27',
                'price' => '228',
                'shop' => 'Saint Brieuc Plongée',
                'sell_price' => null,
            ],
            [
                'tank_id' => '2',
                'maker' => 'Roth Moins',
                'thread_type' => '25x200 6H ISO',
                'date' => '2003-08-01',
                'price' => null,
                'shop' => null,
                'sell_price' => null,
            ],
            [
                'tank_id' => '3',
                'maker' => 'Faber',
                'thread_type' => '25x200 6H ISO',
                'date' => '2008-06-12',
                'price' => '284',
                'shop' => 'Saint Brieuc Plongée',
                'sell_price' => null,
            ],
        ];

        DB::table($table)->insert($data);
    }
}
