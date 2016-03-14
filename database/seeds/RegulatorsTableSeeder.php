<?php

use Illuminate\Database\Seeder;

class RegulatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'regulators';

        DB::table($table)->delete();
        $data = [
            [
                'number' => '6',
                'borrowable' => true,
                'brand' => 'Aqualung',
                'model' => 'Calypso',
                'type'  => 'Double - Manomètre - DS',
                'usage' => 'Air',
                'sn_stage_1' => 'F002874',
                'sn_stage_2' => 'F002874',
                'sn_stage_octo' => 'F004516',
                'owner' => '1',
                'status' => '1'
            ],
            [
                'number' => '21',
                'borrowable' => true,
                'brand' => 'Aqualung',
                'model' => 'Calypso',
                'type'  => 'Double - Manomètre - DS',
                'usage' => 'Air',
                'sn_stage_1' => 'F002875',
                'sn_stage_2' => 'F002875',
                'sn_stage_octo' => 'F004505',
                'owner' => '1',
                'status' => '1'
            ],
        ];

        DB::table($table)->insert($data);
    }
}
