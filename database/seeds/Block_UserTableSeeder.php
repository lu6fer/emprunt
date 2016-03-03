<?php

use Illuminate\Database\Seeder;

class Block_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'block_user';

        DB::table($table)->delete();
        $data = [
            'user_id' => '1',
            'block_id' => '1',
            'borrow'  => '2016-02-02'
        ];

        DB::table($table)->insert($data);
    }
}
