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
                'number' => '1',
                'active' => true,
                'brand' => 'Aqualung',
                'model' => '',
                'size'  => '12l'
            ],
            [
                'number' => '2',
                'active' => true,
                'brand' => 'Aqualung',
                'model' => '',
                'size'  => '15l'
            ],
        ];

        DB::table($table)->insert($data);
    }
}
