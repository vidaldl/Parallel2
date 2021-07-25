<?php

use Illuminate\Database\Seeder;

class Latest-June2021GallerySectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gallery_sections')->delete();
        
        \DB::table('gallery_sections')->insert(array (
            0 => 
            array (
                'id' => '1',
                'title' => 'Our Work',
                'subtitle' => 'Construction in general, check out some of our projects.',
                'back_color' => '#f8f8f8',
            ),
        ));
        
        
    }
}