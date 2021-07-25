<?php

use Illuminate\Database\Seeder;

class Latest-June2021StylesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('styles')->delete();
        
        \DB::table('styles')->insert(array (
            0 => 
            array (
                'id' => '1',
                'primary_color' => NULL,
                'button_primary' => '#273c75',
                'button_secondary' => '#3498db',
                'favicon' => 'content/ADbx0jZt8nDGD72IBej3zYh9snMxqX88oA2ROz2b.png',
                'page_title' => 'Home | Advanced Design & Construction',
                'custom_icon_1' => 'fas fa-fingerprint',
                'custom_link_text_1' => 'Registro',
                'custom_link_address_1' => '#servicios',
                'show_link_1' => '0',
                'custom_icon_2' => 'far fa-user',
                'custom_link_text_2' => 'Clientes',
                'custom_link_address_2' => 'http://www.google.com',
                'show_link_2' => '0',
                'link_mode_1' => '1',
                'link_mode_2' => '1',
            ),
        ));
        
        
    }
}