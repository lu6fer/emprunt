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
            [
                'tank_id'                  => 1,
                'review_id'                => 89,
                'reviewer_id'              => 2,
                'review_date'              => '2016-02-12',
                'previous_review_date'     => '2015-02-20',
                'review_status_id'         => 88,
                'shipping_date'            => '',
                'valve_id'                 => 10,
                'valve_ring_id'            => 16,
                'neck_thread_id'           => 19,
                'neck_thread_size_id'      => 25,
                'ext_state_id'             => 31,
                'int_state_id'             => 44,
                'int_oil'                  => false,
                'int_residue_id'           => 51,
                'todo_maintenance_id'      => 68,
                'performed_maintenance_id' => 85,
                'comment'                  => '',
            ],
            [
                'tank_id'                  => 1,
                'review_id'                => 89,
                'reviewer_id'              => 2,
                'review_date'              => '2015-02-20',
                'previous_review_date'     => '',
                'review_status_id'         => 88,
                'shipping_date'            => '',
                'valve_id'                 => 10,
                'valve_ring_id'            => 16,
                'neck_thread_id'           => 19,
                'neck_thread_size_id'      => 25,
                'ext_state_id'             => 31,
                'int_state_id'             => 44,
                'int_oil'                  => false,
                'int_residue_id'           => 51,
                'todo_maintenance_id'      => 68,
                'performed_maintenance_id' => 85,
                'comment'                  => '',
            ]
        ];

        DB::table($table)->insert($data);
    }
}
