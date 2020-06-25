<?php

use Illuminate\Database\Seeder;

class CatalogSection3sTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('catalog_section3s')->delete();
        
        \DB::table('catalog_section3s')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Catálogo 3',
                'button_primary' => '#EEE',
                'button_secondary' => '#F9F9F9',
                'button_text_color' => '#333',
            ),
        ));
        
        
    }
}