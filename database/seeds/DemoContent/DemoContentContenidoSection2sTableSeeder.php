<?php

use Illuminate\Database\Seeder;

class DemoContentContenidoSection2sTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contenido_section2s')->delete();
        
        \DB::table('contenido_section2s')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Características',
                'display' => 1,
                'back_color' => '#ffffff',
                'desc_link' => 0,
                'icon_style' => 0,
            ),
        ));
        
        
    }
}