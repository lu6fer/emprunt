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
                'borrowable' => true,
                'brand' => 'Scubapro',
                'model' => 'T-one',
                'size'  => 'M',
                'status_id' => '1',
                'owner_id' => '1'
            ],
            [
                'number' => '2',
                'borrowable' => true,
                'brand' => 'Spirotech',
                'model' => 'Atlantis',
                'size'  => 'M',
                'status_id' => '1',
                'owner_id' => '1'
            ],
        ];

        DB::table($table)->insert($data);
    }
}
