<?php

use Illuminate\Database\Seeder;

class Shop2CatalogSectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('catalog_sections')->delete();
        
        \DB::table('catalog_sections')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Catálogo',
                'title_link' => NULL,
                'button_primary' => '#EEE',
                'button_secondary' => '#F9F9F9',
                'button_text_color' => '#333',
                'style' => 0,
                'rows' => 1,
                'img_orientation' => 0,
            ),
        ));
        
        
    }
}