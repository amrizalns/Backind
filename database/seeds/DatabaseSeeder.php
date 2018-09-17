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
        $this->call(roles_seeder::class);
        $this->call(menu_seeder::class);
        $this->call(list_city_seeder::class);
        $this->call(user_seeder::class);
    }
}
