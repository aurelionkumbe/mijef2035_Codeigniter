<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('accounts')->insert([

            ['name' => 'Basic'],
            ['name' => 'Bronze'],
            ['name' => 'Silver'],
            ['name' => 'Gold'],
            
        ]);
    }
}
