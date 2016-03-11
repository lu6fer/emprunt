<?php

use Illuminate\Database\Seeder;

class TanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'tanks';

        DB::table($table)->delete();

        $data = [
            [
                'number' => '4',
                'borrowable' => true,
                'brand' => 'Beuchat',
                'model' => 'Mono - 2 sorties',
                'size'  => '15l',
                'sn_valve' => 'M2562',
                'sn_cylinder' => 'B9154',
                'test_pressure' => '345',
                'operating_pressure' => '230',
                'usage' => 'Air',
                'owner' => '1',
                'status' => '1'
            ],
            [
                'number' => '626',
                'borrowable' => false,
                'brand' => 'Vieux plongeur',
                'model' => 'mono - 2 sorties',
                'size'  => '13.5l',
                'sn_valve' => '2003',
                'sn_cylinder' => '67606',
                'test_pressure' => '348',
                'operating_pressure' => '232',
                'usage' => 'Air',
                'owner' => '2',
                'status' => '1'
            ],
            [
                'number' => '5',
                'borrowable' => true,
                'brand' => 'Auqalung',
                'model' => 'Mono court - 2 sorties',
                'size'  => '12l',
                'sn_valve' => '809178',
                'sn_cylinder' => '08/0017/093',
                'test_pressure' => '372',
                'operating_pressure' => '232',
                'usage' => 'Air',
                'owner' => '1',
                'status' => '1'
            ],
        ];

        DB::table($table)->insert($data);
    }
}
