<?php

use Illuminate\Database\Seeder;

class Shop2InfoSliderImagesTableSeeder extends Seeder
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
                'id' => 2,
                'image' => 'slides/Uz9kgLDgLVJL6lj5KZnZgY8YlnWsXynvSoaWE7iV.png',
                'created_at' => '2020-02-01 16:46:32',
                'updated_at' => '2020-02-01 16:46:32',
            ),
        ));
        
        
    }
}