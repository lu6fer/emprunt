<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'statuses';

        DB::table($table)->delete();

        $data = [
            ['value' => 'En service'],
            ['value' => 'Réformé'],
            ['value' => 'Vendu'],
            ['value' => 'Perdu'],
            ['value' => 'Disparu'],
            ['value' => 'Echangé'],
            ['value' => 'Mis en vente'],
            ['value' => 'Résilié']
        ];

        DB::table($table)->insert($data);
    }
}
