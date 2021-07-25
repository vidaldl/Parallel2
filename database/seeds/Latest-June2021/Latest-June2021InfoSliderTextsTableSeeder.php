<?php

use Illuminate\Database\Seeder;

class Latest-June2021InfoSliderTextsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('info_slider_texts')->delete();
        
        \DB::table('info_slider_texts')->insert(array (
            0 => 
            array (
                'id' => '1',
                'title' => 'To Reality',
                'contenido' => '<p><span style="font-size: large;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut&nbsp;&nbsp;</span></p><p><span style="font-size: large;"></span></p>',
                'button' => NULL,
                'link' => NULL,
                'display_type' => '0',
                'video' => 'videos/ZoKjYCwKQ7rhg2LbTTfwTgUSg5ZYHNk8YqoM5tKY.mp4',
                'display' => '1',
                'back_color' => '#FFFFFF',
            ),
        ));
        
        
    }
}