<?php

use Illuminate\Database\Seeder;

class DemoContentGalleryImagesGalleryItemTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gallery_images_gallery_item')->delete();
        
        \DB::table('gallery_images_gallery_item')->insert(array (
            0 => 
            array (
                'id' => 13,
                'gallery_item_id' => 1,
                'gallery_images_id' => 24,
            ),
            1 => 
            array (
                'id' => 15,
                'gallery_item_id' => 2,
                'gallery_images_id' => 26,
            ),
            2 => 
            array (
                'id' => 16,
                'gallery_item_id' => 1,
                'gallery_images_id' => 27,
            ),
            3 => 
            array (
                'id' => 17,
                'gallery_item_id' => 5,
                'gallery_images_id' => 28,
            ),
            4 => 
            array (
                'id' => 18,
                'gallery_item_id' => 5,
                'gallery_images_id' => 29,
            ),
            5 => 
            array (
                'id' => 19,
                'gallery_item_id' => 5,
                'gallery_images_id' => 30,
            ),
            6 => 
            array (
                'id' => 20,
                'gallery_item_id' => 5,
                'gallery_images_id' => 31,
            ),
            7 => 
            array (
                'id' => 21,
                'gallery_item_id' => 1,
                'gallery_images_id' => 32,
            ),
        ));
        
        
    }
}