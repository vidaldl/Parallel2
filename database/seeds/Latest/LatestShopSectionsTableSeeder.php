<?php

use Illuminate\Database\Seeder;

class LatestShopSectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shop_sections')->delete();
        
        \DB::table('shop_sections')->insert(array (
            0 => 
            array (
                'id' => '1',
                'title' => 'Tienda',
                'title_link' => NULL,
                'button_primary' => '#EEE',
                'button_secondary' => '#F9F9F9',
                'button_text_color' => '#333',
                'style' => '0',
                'rows' => '2',
                'img_orientation' => '1',
            ),
        ));
        
        
    }
}