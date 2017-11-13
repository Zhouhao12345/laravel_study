<?php

use Illuminate\Database\Seeder;

class UsersAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'user_accounts')->insert([
            'id' => 2,
           'name' => str_random(10),
           'email' => str_random(10),
        ]);
    }
}
