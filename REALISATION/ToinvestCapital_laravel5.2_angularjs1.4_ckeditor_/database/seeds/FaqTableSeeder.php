<?php

use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()            
    {
        
        $faqs = array([
            'question' => htmlspecialchars('What are the different capitals of Central African Countries?'),
            'responce' => htmlspecialchars('The different capitals of Central African Countries are: Luanda, Bujumbura, Yaoundé, Libreville, Malabo, Bangui, Kinshasa, Brazzaville, SAO TOME, and Ndjamena. '),
        ],[
            'question' => htmlspecialchars('What are the officials Languages spoken in Central African Countrie'),
            'responce' => htmlspecialchars('Mostly French and English '),
     
        ],[
            'question' => htmlspecialchars('What is the estimated population inhabited in Central African Countries?'),
            'responce' => htmlspecialchars('The 2014 population of Central African Countries is estimated at 150 million. '),
     
        ],[
            'question' => htmlspecialchars('What kind of Government rules in Central African Countries Military or civilian?'),
            'responce' => htmlspecialchars('All the countries of Central Africa are ruled by a civilian Government and have never had a military Government. Cameroon is one of the most peaceful nations in Africa. '),
     
        ],[
            'question' => htmlspecialchars('What is the currency used in Central African Countries? '),
            'responce' => htmlspecialchars(' The countries that speak French use the CFA franc together with five other regional countries. <br> <b> €1.00 is equal to about 655 CFA.</b><br><b>$1.00 is equal to about 585 CFA. <b>'),
     
        ]);
        foreach ($faqs as $faq) {
            DB::table('faqs')->insert($faq);
        }
    }
}
