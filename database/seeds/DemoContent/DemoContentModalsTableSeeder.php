<?php

use Illuminate\Database\Seeder;

class DemoContentModalsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('modals')->delete();
        
        \DB::table('modals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'content_style' => 0,
            'contenido' => '<p style="font-size: 48px;">Aprovecha Nuestras Ofertas:&nbsp;</p><p><iframe width=" 480" height="270" src="https://www.youtube.com/embed/a3ICNMQW7Ok?feature=oembed" frameborder="0" allowfullscreen="allowfullscreen"></iframe>&nbsp;<span style="background-color: rgb(221, 217, 195);"><br></span></p>',
                'image' => NULL,
                'button' => 'Haz Click Para Cerrar',
                'button_sub' => 'En caso que no necesites más información',
                'color' => '#fff',
                'button_color_sec' => '#AB350F',
                'link' => NULL,
                'width' => 6,
                'back_color' => '#FFF',
            ),
        ));
        
        
    }
}