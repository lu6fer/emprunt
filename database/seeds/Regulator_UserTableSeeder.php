<?php

use Illuminate\Database\Seeder;

class Regulator_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'regulator_user';

        DB::table($table)->delete();
        $data = [
            'user_id'      => '1',
            'regulator_id' => '1',
            'borrow_date'  => '2016-02-22 13:55:20'
        ];

        DB::table($table)->insert($data);
    }
}
