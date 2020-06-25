<?php

use Illuminate\Database\Seeder;

class ShopFontsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fonts')->delete();
        
        \DB::table('fonts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'element' => 'titles',
                'font_link' => '<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light&display=swap" rel="stylesheet">',
                'font_name' => 'Shadows Into Light',
            ),
            1 => 
            array (
                'id' => 2,
                'element' => 'body',
                'font_link' => '<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">',
                'font_name' => 'Roboto',
            ),
        ));
        
        
    }
}