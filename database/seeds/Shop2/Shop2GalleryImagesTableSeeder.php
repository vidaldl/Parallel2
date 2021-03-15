<?php

use Illuminate\Database\Seeder;

class Shop2GalleryImagesTableSeeder extends Seeder
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
                'id' => 26,
                'image' => 'content/portfolioGallery/VLDcc10HRM5uQKPsHZPV4lZQWoNNY4O9kdEQjhHw.png',
                'thumbnail' => 'content/portfolioGallery/thumbnails/VLDcc10HRM5uQKPsHZPV4lZQWoNNY4O9kdEQjhHw.png',
            ),
            1 => 
            array (
                'id' => 28,
                'image' => 'content/portfolioGallery/baQASp7WlCUZPGnQknWa9wKeA9GY1ldDRs82j3s8.png',
                'thumbnail' => 'content/portfolioGallery/thumbnails/baQASp7WlCUZPGnQknWa9wKeA9GY1ldDRs82j3s8.png',
            ),
            2 => 
            array (
                'id' => 29,
                'image' => 'content/portfolioGallery/7QAKQulc1PxdhxxMZlncAdwDFnjTCAZNkBqoGTfs.png',
                'thumbnail' => 'content/portfolioGallery/thumbnails/7QAKQulc1PxdhxxMZlncAdwDFnjTCAZNkBqoGTfs.png',
            ),
            3 => 
            array (
                'id' => 30,
                'image' => 'content/portfolioGallery/9VO1QIWv3L4IIeYQEUrSUIqp9aKFRysPY6PkF5Y6.png',
                'thumbnail' => 'content/portfolioGallery/thumbnails/9VO1QIWv3L4IIeYQEUrSUIqp9aKFRysPY6PkF5Y6.png',
            ),
            4 => 
            array (
                'id' => 31,
                'image' => 'content/portfolioGallery/WCMjDsleXE9xal4hj3IbcR4yEZGCESqTxPkdEYjr.png',
                'thumbnail' => 'content/portfolioGallery/thumbnails/WCMjDsleXE9xal4hj3IbcR4yEZGCESqTxPkdEYjr.png',
            ),
            5 => 
            array (
                'id' => 33,
                'image' => 'content/portfolioGallery/ezhtm60yADSWlG3aCD9X5mKiR8ukQvT7IBYbsUYO.png',
                'thumbnail' => 'content/portfolioGallery/thumbnails/ezhtm60yADSWlG3aCD9X5mKiR8ukQvT7IBYbsUYO.png',
            ),
            6 => 
            array (
                'id' => 34,
                'image' => 'content/portfolioGallery/TEzYSJYGpTNo5UOzuLdnKjUVBkRyJJgpZyJDIgeS.png',
                'thumbnail' => 'content/portfolioGallery/thumbnails/TEzYSJYGpTNo5UOzuLdnKjUVBkRyJJgpZyJDIgeS.png',
            ),
            7 => 
            array (
                'id' => 35,
                'image' => 'content/portfolioGallery/XgqKSpQk9obW2xNSdWByGR3ZZtCjb7vKDjChncdz.png',
                'thumbnail' => 'content/portfolioGallery/thumbnails/XgqKSpQk9obW2xNSdWByGR3ZZtCjb7vKDjChncdz.png',
            ),
        ));
        
        
    }
}