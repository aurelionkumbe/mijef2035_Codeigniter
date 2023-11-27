<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('countries')->insert([

            ['code' => 'CMR', 'name'=>'Cameroon'],
            ['code' => 'GBN', 'name'=>'Gabon'],
            ['code' => 'CON', 'name'=>'Congo'],
            ['code' => 'TCH', 'name'=>'Tchad'],
            ['code' => 'GIN', 'name'=>'Guinea'],
            ['code' => 'RCA', 'name'=>'Republic Central of Africa'],
            ['code' => 'NIG', 'name'=>'Niger'],
            ['code' => 'NGR', 'name'=>'Nigeria'],
            ['code' => 'CIV', 'name'=>'Ivory Cost'],
            ['code' => 'GHN', 'name'=>'Ghana'],
           
        ]);
    }
}
