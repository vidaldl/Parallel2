<?php

use Illuminate\Database\Seeder;

class ShopServiceSection2sTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_section2s')->delete();
        
        \DB::table('service_section2s')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Servicios 2',
                'display' => 1,
                'back_color' => '#FFFFFF',
                'desc_link' => 0,
                'icon_style' => 0,
            ),
        ));
        
        
    }
}