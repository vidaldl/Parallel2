<?php

use Illuminate\Database\Seeder;

class LatestContenidoSectionFootersTableSeeder extends Seeder
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
                'id' => '1',
                'copy' => 'Parallel Inc.',
                'logo' => 'content/footer/nwaLW31NHZz5Rfxqepar3yE7BTT46jNvl065boCQ.png',
                'social_title' => 'Get In Touch',
                'acerca' => '<p>We have been in the construction business for over 30 years. And now we are extending our service to New York, Connecticut, and New Jersey. Having maintained a standard of the highest quality for our customer\'s satisfaction.</p>',
                'style' => '2',
                'line' => '0',
                'line_style' => '1',
                'back_color' => '#333',
                'color' => '#CCC',
                'color_sec' => '#999',
            ),
        ));
        
        
    }
}