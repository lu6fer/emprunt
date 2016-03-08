<?php

use Illuminate\Database\Seeder;

class StabsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'stabs';

        DB::table($table)->delete();
        $data = [
            [
                'number' => '1',
                'active' => true,
                'brand' => 'Scubapro',
                'model' => 'T-one',
                'size'  => 'M'
            ],
            [
                'number' => '2',
                'active' => true,
                'brand' => 'Spirotech',
                'model' => 'Atlantis',
                'size'  => 'M'
            ],
        ];

        DB::table($table)->insert($data);
    }
}