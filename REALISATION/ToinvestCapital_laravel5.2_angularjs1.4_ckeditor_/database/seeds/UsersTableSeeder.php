<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert(
                [
                    'name' => 'ToInvestCapital',
                    'phone' => '(+237) 672 782 004 / (+237) 664 465 587',
                    'email' => 'admin@toinvestcapital.cm', 
                    'password' => bcrypt('secretofadmin'),
                    'account_id' => '1',
                    'is_admin' => true,
                    'avatar' => 'admin.png'
        ]);
    }

}
