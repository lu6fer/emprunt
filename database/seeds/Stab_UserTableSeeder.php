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
            'created_at'  => '2015-06-25 12:30:23'
        ];

        DB::table($table)->insert($data);
    }
}
