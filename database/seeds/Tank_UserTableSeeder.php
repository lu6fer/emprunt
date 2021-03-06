<?php

use Illuminate\Database\Seeder;

class Tank_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'tank_user';

        DB::table($table)->delete();
        $data = [
            'user_id'      => '1',
            'tank_id'     => '1',
            'borrow_date'  => '2015-01-02 15:08:40'
        ];

        DB::table($table)->insert($data);
    }
}
