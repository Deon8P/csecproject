<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'user_username' => str_random(10),
            'user_username' => str_random(10),
            'user_username' => str_random(10),
            'password' => bcrypt('asdasd'),
        ]);
    }
}
