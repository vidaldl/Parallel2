<?php

use Illuminate\Database\Seeder;

class DemoContentContenidoSectionFootersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contenido_section_footers')->delete();
        
        \DB::table('contenido_section_footers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'copy' => 'Parallel Inc.',
                'logo' => 'content/footer/C7mS3XONiL8C889DjZ8725mWgqt0jIVD9hOvDjZW.png',
                'social_title' => 'Conectate',
                'acerca' => '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa&nbsp;</p><p>qui officia deserunt mollit anim id est laborum.s&nbsp;</p>',
                'style' => 2,
                'line' => 2,
                'line_style' => 1,
                'back_color' => '#333',
                'color' => '#CCC',
                'color_sec' => '#999',
            ),
        ));
        
        
    }
}