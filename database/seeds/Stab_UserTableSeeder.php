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
            'user_id'     => '1',
            'stab_id'     => '1',
            'borrow_date' => '2015-12-06 12:35:42'
        ];

        DB::table($table)->insert($data);
    }
}
