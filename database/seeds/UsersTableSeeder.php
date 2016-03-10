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
                'active' => true,
                'tank' => true,
                'regulator' => true,
                'stab' => true
            ],
            [
                'firstname' => 'SubAlcatel',
                'lastname' => null,
                'email' => null,
                'password' => null,
                'active' => false,
                'tank' => false,
                'regulator' => false,
                'stab' => false
            ],
            [
                'fisrtname' => 'Richard',
                'lastname' => 'Josse',
                'email' => 'frichar.josse@gmail.com',
                'password' => Hash::make('richard'),
                'active' => true,
                'tank' => true,
                'regulator' => false,
                'stab' => true
            ],
        ];

        DB::table($table)->insert($data);
    }
}
