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
                'number' => '1',
                'active' => true,
                'brand' => 'Aqualung',
                'model' => 'Calypso',
                'type'  => 'Octopus'
            ],
            [
                'number' => '2',
                'active' => true,
                'brand' => 'Aqualung',
                'model' => 'Calypso',
                'type'  => 'Simple'
            ],
        ];

        DB::table($table)->insert($data);
    }
}
