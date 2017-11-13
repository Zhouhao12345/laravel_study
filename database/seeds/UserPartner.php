<?php

use Illuminate\Database\Seeder;

class UserPartner extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'user_partners')->insert(
            [
                'id' => 3,
                'name' => 'zhouhao3',
                'email' => 'zhouhao3@qq.com',
            ]);
        DB::table( 'user_partners')->update(
            [
                'name' => 'zhouhao2',
                'email' => 'zhouhao2@qq.com',
            ]);
    }
}
