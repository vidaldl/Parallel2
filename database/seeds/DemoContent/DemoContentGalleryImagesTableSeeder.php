<?php

use Illuminate\Database\Seeder;

class DemoContentGalleryImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gallery_images')->delete();
        
        \DB::table('gallery_images')->insert(array (
            0 => 
            array (
                'id' => 24,
                'image' => 'content/portfolioGallery/CS4aIHgYnPwLVDXfT9eCrx2SXg2ShBC4ycHD71Xy.png',
                'thumbnail' => NULL,
            ),
            1 => 
            array (
                'id' => 26,
                'image' => 'content/portfolioGallery/zvxd9Gb7xtmYiyrXOOEm6em4IXV4OlOUWMI49n5z.png',
                'thumbnail' => NULL,
            ),
            2 => 
            array (
                'id' => 27,
                'image' => 'content/portfolioGallery/qCUvjebRy52BE2CO5OQBTmSVbmlRPvvn0al5nRjP.png',
                'thumbnail' => NULL,
            ),
            3 => 
            array (
                'id' => 28,
                'image' => 'content/portfolioGallery/Ew2Jrqwc2Leak7I0zwO3x58Yr7QUzEKm0GYRFeRm.png',
                'thumbnail' => NULL,
            ),
            4 => 
            array (
                'id' => 29,
                'image' => 'content/portfolioGallery/n97klE4QWMHL5YkMdH7LDwchfZ5O2kOMdKAaiyLq.png',
                'thumbnail' => NULL,
            ),
            5 => 
            array (
                'id' => 30,
                'image' => 'content/portfolioGallery/oqOqGgZ8vWZDO1W0YuWK0F8R6FGklRgcs9kG5Ptc.png',
                'thumbnail' => NULL,
            ),
            6 => 
            array (
                'id' => 31,
                'image' => 'content/portfolioGallery/qbdzZ7WEbVWCXwRqLwPSCWpx7RKvpoLY0dHPckDT.png',
                'thumbnail' => NULL,
            ),
            7 => 
            array (
                'id' => 32,
                'image' => 'content/portfolioGallery/LDbJYewa1E50aSg8xRhxY3Aj55g7q0WREJZhh8dC.png',
                'thumbnail' => NULL,
            ),
        ));
        
        
    }
}