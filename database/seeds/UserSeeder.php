<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'users')->insert([
            'name' => 'zhouhao2',
            'email' => 'zhouhao2',
            'password' => 'zhouhao2',
        ]);
        DB::table( 'users')->insert([
            'name' => 'zhouhao3',
            'email' => 'zhouhao3',
            'password' => 'zhouhao3',
        ]);
    }
}
