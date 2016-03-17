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
                'firstname' => 'SubAlcatel',
                'lastname' => null,
                'email' => null,
                'phone_fix' => null,
                'phone_mob' => null,
                'phone_work' => null,
                'licence' => null,
                'password' => null,
                'active' => false,
                'tank' => false,
                'regulator' => false,
                'stab' => false
            ],
            [
                'fisrtname' => 'Richard',
                'lastname' => 'Josse',
                'email' => 'richar.josse@gmail.com',
                'phone_fix' => '0102030405',
                'phone_mob' => null,
                'phone_work' => null,
                'licence' => 'A-29-687452',
                'password' => Hash::make('richard'),
                'active' => true,
                'tank' => true,
                'regulator' => false,
                'stab' => true
            ],
            [
                'firstname' => 'Florent',
                'lastname' => 'Hunkeler',
                'email' => 'florent.hunkeler@gmail.com',
                'phone_mob' => '0607080910',
                'phone_fix' => '0104070809',
                'phone_work' => '0708090102',
                'licence' => 'A-29-784018',
                'password' => Hash::make('florent'),
                'active' => true,
                'tank' => true,
                'regulator' => true,
                'stab' => true
            ]
        ];

        DB::table($table)->insert($data);
    }
}
