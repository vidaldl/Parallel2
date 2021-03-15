<?php

use Illuminate\Database\Seeder;

class Shop2InfoSliderText3sTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('info_slider_text3s')->delete();
        
        \DB::table('info_slider_text3s')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Simplifica',
                'contenido' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'button' => 'Menos Info',
                'link' => NULL,
                'video' => 'videos/pzjXEEkPytxXXS2pOntStiKKFnT7XSiW4tVP5Cx1.mp4',
                'display_type' => 0,
                'display' => 0,
                'back_color' => '#FFFFFF',
            ),
        ));
        
        
    }
}