<?php

use Illuminate\Database\Seeder;

class PostesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('poste')->insert([
            'nom_p' => '',
            'departement_id' => '',
        ]);
    }

}
