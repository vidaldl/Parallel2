<?php

use Illuminate\Database\Seeder;

class DemoContentInfoSliderImage3sTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('info_slider_image3s')->delete();
        
        \DB::table('info_slider_image3s')->insert(array (
            0 => 
            array (
                'id' => 8,
                'image' => 'slides/6Upiz5TC3K9IXZoysyojqoEQOKshWSDwQe8Y4adF.png',
                'created_at' => '2020-02-01 16:52:02',
                'updated_at' => '2020-02-01 16:52:02',
            ),
            1 => 
            array (
                'id' => 9,
                'image' => 'slides/xDVZjm6RkCBpnqfxVdS1b0AsNWF9SO7LRDH2XOJ0.png',
                'created_at' => '2020-02-01 16:52:22',
                'updated_at' => '2020-02-01 16:52:22',
            ),
            2 => 
            array (
                'id' => 10,
                'image' => 'slides/VDsu8zaPln05qwULd0I4eNREmpn8LOeJjPie0600.png',
                'created_at' => '2020-02-01 16:52:54',
                'updated_at' => '2020-02-01 16:52:54',
            ),
        ));
        
        
    }
}