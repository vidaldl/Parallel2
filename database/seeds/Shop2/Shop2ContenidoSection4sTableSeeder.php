<?php

use Illuminate\Database\Seeder;

class Shop2ContenidoSection4sTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contenido_section4s')->delete();
        
        \DB::table('contenido_section4s')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Artículos',
                'tagline' => 'Mantente al tanto con nosotros!',
                'button' => 'Más Articulos',
                'link' => NULL,
                'display' => 1,
                'back_color' => '#ffffff',
                'created_at' => '2019-06-26 00:01:15',
                'updated_at' => '2019-06-26 00:01:15',
            ),
        ));
        
        
    }
}