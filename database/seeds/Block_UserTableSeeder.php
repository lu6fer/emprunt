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
            'user_id'      => '1',
            'block_id'     => '1',
            'borrow_date'  => '2015-01-02 15:08:40'
        ];

        DB::table($table)->insert($data);
    }
}
