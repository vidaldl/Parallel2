<?php

use Illuminate\Database\Seeder;

class LatestPricingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pricings')->delete();
        
        \DB::table('pricings')->insert(array (
            0 => 
            array (
                'id' => '1',
                'image' => 'content/pricing/nK2KdiD2ot3QofXEke4dVoalK5Lw407G8Bkr4zZY.png',
                'title' => 'Desglose',
                'price' => '100',
                'recurrence' => 'Por Més',
                'button' => 'Hello',
                'link' => NULL,
                'display' => '1',
                'back_color' => NULL,
                'created_at' => '2019-07-23 17:32:44',
                'updated_at' => '2019-07-23 17:32:44',
            ),
            1 => 
            array (
                'id' => '2',
                'image' => 'content/pricing/7aBx95MdET9X5IdDAMasbpQLPgwNFuhXqVmniwrS.png',
                'title' => 'SMALL TEAM',
                'price' => '250',
                'recurrence' => 'Por Més',
                'button' => 'Registrate',
                'link' => NULL,
                'display' => '1',
                'back_color' => NULL,
                'created_at' => '2019-07-23 17:32:44',
                'updated_at' => '2019-07-23 17:32:44',
            ),
            2 => 
            array (
                'id' => '4',
                'image' => 'content/pricing/I2zgyBs5oIkAt8VO2Z3BhyTyu7drq6nUb6EaTIC3.png',
                'title' => 'Hello',
                'price' => '500',
                'recurrence' => 'Por',
                'button' => 'No',
                'link' => NULL,
                'display' => '0',
                'back_color' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => '5',
                'image' => 'content/pricing/XznQbFrWT1TzGxbktcHjkwbz4zX2sKijPP5BRhOG.png',
                'title' => 'Plan Flex Max',
                'price' => '1500',
                'recurrence' => 'Por mes',
                'button' => 'Más Información',
                'link' => 'http://google.com',
                'display' => '0',
                'back_color' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}