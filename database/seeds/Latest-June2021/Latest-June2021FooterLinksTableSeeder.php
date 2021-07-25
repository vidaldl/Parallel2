<?php

use Illuminate\Database\Seeder;

class Latest-June2021FooterLinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('footer_links')->delete();
        
        \DB::table('footer_links')->insert(array (
            0 => 
            array (
                'id' => '1',
                'icon' => 'icon-instagram',
                'link' => 'http://instagram.com',
                'color' => '#f7f7f7',
                'back_color' => '#c13584',
                'deleted_at' => '2021-06-06 01:41:02',
                'created_at' => NULL,
                'updated_at' => '2021-06-06 01:41:02',
            ),
            1 => 
            array (
                'id' => '4',
                'icon' => 'icon-facebook',
                'link' => '#',
                'color' => '#f7f7f7',
                'back_color' => '#3b5998',
                'deleted_at' => '2021-06-06 01:41:03',
                'created_at' => NULL,
                'updated_at' => '2021-06-06 01:41:03',
            ),
            2 => 
            array (
                'id' => '6',
                'icon' => 'icon-email3',
                'link' => 'mailto: ramon.mercedes@gmail.com',
                'color' => '#f7f7f7',
                'back_color' => '#273c75',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => '7',
                'icon' => 'icon-phone3',
                'link' => 'tel:917-443-4644',
                'color' => '#f7f7f7',
                'back_color' => '#128c7e',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}