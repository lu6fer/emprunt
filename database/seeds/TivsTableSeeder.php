<?php

use Illuminate\Database\Seeder;

class TivsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'tivs';

        DB::table($table)->delete();
        $data = [
            'tank_id' => 1,
            'review' => 90,
            'reviewer' => 2,
            'review_date' => '2016-02-12',
            'previous_review_date' => '',
            'review_status' => 88,
            'shipping_date'  => '',
            'valve' => 10,
            'valve_ring'  => 16,
            'neck_thread'  => 19,
            'neck_thread_size'  => 25,
            'ext_state' => 31,
            'int_state'  => 44,
            'int_oil'   => false,
            'int_residue'  => 51,
            'todo_maintenance'  => 68,
            'performed_maintenance' => 85,
            'comment'  => '',
        ];

        DB::table($table)->insert($data);
    }
}
