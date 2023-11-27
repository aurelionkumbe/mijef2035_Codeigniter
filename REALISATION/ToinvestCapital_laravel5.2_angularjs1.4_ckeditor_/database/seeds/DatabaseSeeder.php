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
        $this->call(AccountsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        //$this->call(ServiceTableSeeder::class);
        $this->call(FaqTableSeeder::class);
    }
}
