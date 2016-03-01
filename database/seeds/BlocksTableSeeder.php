<?php

use Illuminate\Database\Seeder;

class BlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'blocks';

        DB::table($table)->delete();
        $data = [
            [
                'numero' => '1',
                'active' => true,
                'brand' => 'Aqualung',
                'model' => '',
                'size'  => '12l'
            ],
            [
                'numero' => '2',
                'active' => true,
                'brand' => 'Aqualung',
                'model' => '',
                'size'  => '15l'
            ],
        ];

        DB::table($table)->insert($data);
    }
}
