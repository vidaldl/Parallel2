<?php

use Illuminate\Database\Seeder;

class LatestInfoSliderImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('info_slider_images')->delete();
        
        \DB::table('info_slider_images')->insert(array (
            0 => 
            array (
                'id' => '3',
                'image' => 'slides/NX4lyseqCHlEFEG6HtnJeCwij3eqvGUN5bOsczOX.png',
                'created_at' => '2021-06-06 01:14:54',
                'updated_at' => '2021-06-06 01:14:54',
            ),
            1 => 
            array (
                'id' => '4',
                'image' => 'slides/HpKxzQe7wVrQQDxmlb4tM3DW1QQtHvaWB1OV2HT6.png',
                'created_at' => '2021-06-06 01:15:17',
                'updated_at' => '2021-06-06 01:15:17',
            ),
        ));
        
        
    }
}