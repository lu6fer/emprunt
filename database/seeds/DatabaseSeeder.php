<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StabsTableSeeder::class);
        $this->call(BlocksTableSeeder::class);
        $this->call(RegulatorsTableSeeder::class);
        $this->call(Block_UserTableSeeder::class);
        $this->call(Regulator_UserTableSeeder::class);
        $this->call(Stab_UserTableSeeder::class);

    }
}
