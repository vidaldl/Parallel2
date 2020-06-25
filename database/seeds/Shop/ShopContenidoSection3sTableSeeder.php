<?php

use Illuminate\Database\Seeder;

class ShopContenidoSection3sTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contenido_section3s')->delete();
        
        \DB::table('contenido_section3s')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Conoce mas sobre nosotros',
                'contenido' => '<p>Conoce mas sobre nosotros</p>',
                'button' => 'Conoce Todas Las Funciones',
                'background_color' => '#d2d2d2',
                'text_color' => '#464646',
                'link' => 'https://google.com',
                'link_type' => 0,
            ),
        ));
        
        
    }
}