<?php

use Illuminate\Database\Seeder;

class ShopInfoSliderImage2sTableSeeder extends Seeder
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
                'id' => 3,
                'image' => 'slides/WnbQpaiKWeySPsoE3ZyiIHeOrJnecQ6jD7scmqg1.png',
                'created_at' => '2019-07-30 17:42:32',
                'updated_at' => '2019-07-30 17:42:32',
            ),
            1 => 
            array (
                'id' => 4,
                'image' => 'slides/72t06qPn65wv0hLCz4yWPmnvbhSqpeCI5WQFrEHF.png',
                'created_at' => '2019-07-30 18:04:49',
                'updated_at' => '2019-07-30 18:04:49',
            ),
            2 => 
            array (
                'id' => 5,
                'image' => 'slides/1rnOAVpp9PPRxQVElzbjC6ut973Yx3TGDGPNqcjs.png',
                'created_at' => '2020-01-25 21:48:38',
                'updated_at' => '2020-01-25 21:48:38',
            ),
        ));
        
        
    }
}