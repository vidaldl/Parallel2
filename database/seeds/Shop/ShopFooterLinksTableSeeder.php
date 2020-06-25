<?php

use Illuminate\Database\Seeder;

class ShopFooterLinksTableSeeder extends Seeder
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
                'id' => 1,
                'icon' => 'icon-instagram',
                'link' => 'http://instagram.com',
                'color' => '#f7f7f7',
                'back_color' => '#c13584',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 4,
                'icon' => 'icon-facebook',
                'link' => '#',
                'color' => '#f7f7f7',
                'back_color' => '#3b5998',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-02-20 20:33:45',
            ),
            2 => 
            array (
                'id' => 6,
                'icon' => 'icon-twitter1',
                'link' => '#',
                'color' => '#f7f7f7',
                'back_color' => '#1da1f2',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}