<?php

use Illuminate\Database\Seeder;

class DemoContentCatalogItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('catalog_items')->delete();
        
        \DB::table('catalog_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'T-Shirt',
                'img_primaria' => 'content/catalog/vN3EVXTrsVYODIypWauoSXEoigOAPlG3uG4ANvUn.png',
                'img_secundaria' => 'content/catalog/ozBTgru55ct2kvK8wT842gQ5hQNnwpINUxAObKlL.png',
                'img_btn' => 'Acercar',
                'img_icon' => 'fas fa-search-plus',
                'precio' => 500.0,
                'destacado' => 1,
                'destacado_title' => 'Oferta',
                'precio_nuevo' => '350.50',
                'button' => 'Conoce Más',
                'button_icon' => 'fas fa-arrow-right',
                'button_link' => 'http://google.com',
                'link_code' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Joyas',
                'img_primaria' => 'content/catalog/936u1ci7l0AbljP3WqUCFp4HxgscK0BCrrLPGlTD.png',
                'img_secundaria' => NULL,
                'img_btn' => 'Acercar',
                'img_icon' => 'fas fa-search-plus',
                'precio' => 350.0,
                'destacado' => 0,
                'destacado_title' => NULL,
                'precio_nuevo' => NULL,
                'button' => NULL,
                'button_icon' => 'fas fa-arrow-right',
                'button_link' => '#',
                'link_code' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Relojes',
                'img_primaria' => 'content/catalog/8Qim2ZhdquZWFEDUxuqpWinspHkAwHyLTFI4EcEj.png',
                'img_secundaria' => 'content/catalog/2f1GQZ28XnOIcU7uGFruVaKCBKb5qszIjEwHCpiS.png',
                'img_btn' => 'Acercar',
                'img_icon' => 'fas fa-search-plus',
                'precio' => 800.0,
                'destacado' => 0,
                'destacado_title' => NULL,
                'precio_nuevo' => NULL,
                'button' => NULL,
                'button_icon' => 'fas fa-arrow-right',
                'button_link' => '#',
                'link_code' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Tenis',
                'img_primaria' => 'content/catalog/MSdlPEd1ZfzREsZVBhr255dzCZJvq9YNRLguihWD.png',
                'img_secundaria' => NULL,
                'img_btn' => 'Acercar',
                'img_icon' => 'fas fa-search-plus',
                'precio' => 1200.0,
                'destacado' => 1,
                'destacado_title' => '2x1!!',
                'precio_nuevo' => '725.75',
                'button' => NULL,
                'button_icon' => 'fas fa-arrow-right',
                'button_link' => '#',
                'link_code' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Fotografía y Edición',
                'img_primaria' => 'content/catalog/KWMCMpK8mvGXSFneAG7T1F5bpy656MdKjdFotoKH.png',
                'img_secundaria' => NULL,
                'img_btn' => 'Acercar',
                'img_icon' => 'fas fa-search-plus',
                'precio' => 5000.0,
                'destacado' => 0,
                'destacado_title' => NULL,
                'precio_nuevo' => NULL,
                'button' => NULL,
                'button_icon' => 'fas fa-arrow-right',
                'button_link' => '#',
                'link_code' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}