<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $services = array([
                'name' => htmlspecialchars('Agriculture and Agro-Industry expansion'),
                'content' => '',
            ], [
                'name' => htmlspecialchars('Education & health'),
                'content' => '',
            ], [

                'name' => htmlspecialchars('Environment protection'),
                'content' => ''
            ], ['name' => htmlspecialchars('House Construction technologies '),
                'content' => '',
            ], [
                'name' => htmlspecialchars('Information technologies '),
                'content' => ''
            ], [
                'name' => htmlspecialchars('Property development '),
                'content' => ''
            ], [
                'name' => htmlspecialchars('Renewable Energy '),
                'content' => '',
            ], [
                'name' => htmlspecialchars('Tourism & Hospitality '),
                'content' => ''
        ]);
        foreach ($services as $s) {
            DB::table('services')->insert($s);
        }
    }

}
