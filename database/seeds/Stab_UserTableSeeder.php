<?php

use Illuminate\Database\Seeder;

class Stab_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'stab_user';

        DB::table($table)->delete();
        $data = [
            'user_id' => '1',
            'stab_id' => '1',
            'borrow'  => '2015-06-25'
        ];

        DB::table($table)->insert($data);
    }
}
