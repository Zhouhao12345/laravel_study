<?php

use Illuminate\Database\Seeder;

class CompanyPartner extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'company_partner_ref')->insert(
            [
                'company_id' => 1,
                'partner_id' => 1,
            ]);
        DB::table( 'company_partner_ref')->insert(
            [
                'company_id' => 3,
                'partner_id' => 2,
            ]);
        DB::table( 'company_partner_ref')->insert(
            [
                'company_id' => 2,
                'partner_id' => 1,
            ]);
        DB::table( 'company_partner_ref')->insert(
            [
                'company_id' => 3,
                'partner_id' => 1,
            ]);
    }
}
