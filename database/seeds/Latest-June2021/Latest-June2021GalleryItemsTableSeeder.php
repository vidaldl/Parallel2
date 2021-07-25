<?php

use Illuminate\Database\Seeder;

class Latest-June2021GalleryItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gallery_items')->delete();
        
        \DB::table('gallery_items')->insert(array (
            0 => 
            array (
                'id' => '1',
                'title' => 'Chapel Decoration',
                'subtitle' => '4th St. NY',
                'desc_title' => 'Mostramos tres Imágenes',
                'video' => 'https://www.youtube.com/watch?v=OX31kZbAXsA',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>',
                'left_btn' => 'Expander',
                'right_btn' => 'Más',
                'display_tooltip' => '1',
                'display_type' => '0',
                'display_simple' => '1',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => '2',
                'title' => 'Full Construction',
                'subtitle' => '3rd St. NY, United States',
                'desc_title' => 'Mostramos una Imagen',
                'video' => NULL,
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>',
                'left_btn' => 'Expander',
                'right_btn' => 'Más',
                'display_tooltip' => '1',
                'display_type' => '0',
                'display_simple' => '1',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-01-30 22:14:12',
            ),
            2 => 
            array (
                'id' => '3',
                'title' => 'Interior Renovation',
                'subtitle' => '3rd St. NY, United States',
                'desc_title' => 'Mostramos un Video',
                'video' => 'https://www.youtube.com/watch?v=SvApoH3n9FE',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p><p></p><ul><li>Lorem</li><li>Ipsum</li><li>Dolor</li><li>Sit</li><li>Amet</li></ul><p></p>',
                'left_btn' => 'Expander',
                'right_btn' => 'Más',
                'display_tooltip' => '1',
                'display_type' => '0',
                'display_simple' => '1',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => '5',
                'title' => 'Interior Examples',
            'subtitle' => '(Click to expand)',
                'desc_title' => 'Mostramos Cuatro Imagenes',
                'video' => NULL,
                'desc' => '<p><font face="Times New Roman, Times, serif" size="4" style="font-size: x-large;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&nbsp;</font><br></p>',
                'left_btn' => 'Expander',
                'right_btn' => 'Más',
                'display_tooltip' => '1',
                'display_type' => '0',
                'display_simple' => '1',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => '6',
                'title' => 'Pool Examples',
            'subtitle' => '(Click to expand)',
                'desc_title' => 'Numb',
                'video' => NULL,
                'desc' => '<p>Null</p>',
                'left_btn' => 'Expander',
                'right_btn' => 'Más',
                'display_tooltip' => '1',
                'display_type' => '0',
                'display_simple' => '1',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => '7',
                'title' => 'Chapel Renovation',
                'subtitle' => 'Manhattan, NY',
                'desc_title' => NULL,
                'video' => NULL,
                'desc' => NULL,
                'left_btn' => 'Expander',
                'right_btn' => 'Más',
                'display_tooltip' => '1',
                'display_type' => '0',
                'display_simple' => '1',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}