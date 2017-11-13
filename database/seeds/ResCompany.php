<?php

use Illuminate\Database\Seeder;

class ResCompany extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'res_company')->insert(
            [
                'name' => 'mycompany1',
                'address' => 'Second Street',
            ]);
        DB::table( 'res_company')->insert(
            [
                'name' => 'mycompany2',
                'address' => 'First Street',
            ]);
    }
}
