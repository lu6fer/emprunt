<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'users';

        DB::table($table)->delete();
        $data = [
            [
                'firstname' => 'Florent',
                'lastname' => 'Hunkeler',
                'email' => 'florent.hunkeler@gmail.com',
                'password' => Hash::make('florent'),
                'active' => true
            ],
            [
                'fisrtname' => 'Richard',
                'lastname' => 'Josse',
                'email' => 'frichar.josse@gmail.com',
                'password' => Hash::make('richard'),
                'active' => true
            ],
        ];

        DB::table($table)->insert($data);
    }
}