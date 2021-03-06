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
        $this->call(StatusesTableSeeder::class);
        $this->call(Tiv_statusesTableSeeder::class);
        $this->call(StabsTableSeeder::class);
        $this->call(TanksTableSeeder::class);
        $this->call(RegulatorsTableSeeder::class);
        $this->call(Tank_UserTableSeeder::class);
        $this->call(Regulator_UserTableSeeder::class);
        $this->call(Stab_UserTableSeeder::class);
        $this->call(TivsTableSeeder::class);
        $this->call(Buy_tanksTableSeeder::class);
    }
}
