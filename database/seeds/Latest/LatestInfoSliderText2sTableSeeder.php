<?php

use Illuminate\Database\Seeder;

class LatestInfoSliderText2sTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('info_slider_text2s')->delete();
        
        \DB::table('info_slider_text2s')->insert(array (
            0 => 
            array (
                'id' => '1',
                'title' => 'We do Planning Designing and Building, Making Your Idea Come True',
                'contenido' => NULL,
                'button' => NULL,
                'link' => NULL,
                'display_type' => '0',
                'video' => 'videos/A3S3luIHRx1azdEoXpDwmKKddHSMhARvk5wz47a4.mp4',
                'display' => '0',
                'back_color' => '#FFFFFF',
            ),
        ));
        
        
    }
}