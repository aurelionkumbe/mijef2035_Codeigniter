<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('menus')->insert([

            ['name_fr' => 'Bulletin Hebdomadaire', 'name_en' => 'Weekly bulletin'],
            
            // ces derniers ne sont pas vraiment des menus
            //['name_fr' => 'Service', 'name_en' => 'Service'],
            //['name_fr' => 'Document', 'name_en' => 'Document'],
            //['name_fr' => 'FAQ', 'name_en' => 'FAQ'],            
        ]);
    }

}
