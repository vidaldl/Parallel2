<?php

use Illuminate\Database\Seeder;

class Service2sTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service2s')->delete();
        
        \DB::table('service2s')->insert(array (
            0 => 
            array (
                'id' => 3,
                'icon' => 'fas fa-bullseye',
                'icon_img' => NULL,
                'title' => 'Misión',
                'contenido' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
                'image' => NULL,
                'contenido_modal' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 4,
                'icon' => 'fas fa-mountain',
                'icon_img' => NULL,
                'title' => 'Visión',
                'contenido' => 'dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'image' => NULL,
                'contenido_modal' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 5,
                'icon' => 'fas fa-ribbon',
                'icon_img' => NULL,
                'title' => 'Valores',
                'contenido' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image' => NULL,
                'contenido_modal' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}