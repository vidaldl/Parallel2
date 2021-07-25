<?php

use Illuminate\Database\Seeder;

class Latest-June2021InfoSliderImage2sTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('info_slider_image2s')->delete();
        
        \DB::table('info_slider_image2s')->insert(array (
            0 => 
            array (
                'id' => '7',
                'image' => 'slides/tjTSnPQ7CKTMNfW9JqRCmzDCtocBm0dqGP6F5Y7d.png',
                'created_at' => '2021-06-06 01:11:40',
                'updated_at' => '2021-06-06 01:11:40',
            ),
            1 => 
            array (
                'id' => '8',
                'image' => 'slides/1YyTarCYGIsVECduW9TNprmAE4yEMq6E7eTwOAGw.png',
                'created_at' => '2021-06-27 23:54:32',
                'updated_at' => '2021-06-27 23:54:32',
            ),
            2 => 
            array (
                'id' => '9',
                'image' => 'slides/wjpG9vvP7agnJOt1Kw0V4XyD8kmQYJ7845Jnri6M.png',
                'created_at' => '2021-06-27 23:54:56',
                'updated_at' => '2021-06-27 23:54:56',
            ),
        ));
        
        
    }
}