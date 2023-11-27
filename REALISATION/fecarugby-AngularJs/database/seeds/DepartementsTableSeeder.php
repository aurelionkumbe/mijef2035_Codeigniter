<?php

use Illuminate\Database\Seeder;

class DepartementsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('departement')->insert([
            'nom_dep' => 'Technique',
        ]);
        DB::table('departement')->insert([
            'nom_dep' => 'Administratif',
        ]);
    }

}
