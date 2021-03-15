<?php

use Illuminate\Database\Seeder;

class Shop2CatalogItem2sTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('catalog_item2s')->delete();
        
        \DB::table('catalog_item2s')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Medias',
                'img_primaria' => 'content/catalog/28Tss3fgZS4jhWgaC4O4HlpF5n8fQVwvq2hGJvso.png',
                'img_secundaria' => NULL,
                'img_btn' => 'Acercar',
                'img_icon' => 'fas fa-search-plus',
                'precio' => NULL,
                'destacado' => 0,
                'destacado_title' => NULL,
                'precio_nuevo' => NULL,
                'button' => 'Más Información',
                'button_icon' => 'fas fa-arrow-right',
                'button_link' => '#',
                'link_code' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Tenis',
                'img_primaria' => 'content/catalog/tT0hl8hNpX2d2dTW71k5pJHAnvcNytBLdjf0gpzZ.png',
                'img_secundaria' => 'content/catalog/HCxRS8k8ucUUcioOJWlxjmZ6bOeQHs0wUedyhqUP.png',
                'img_btn' => 'Acercar',
                'img_icon' => 'fas fa-search-plus',
                'precio' => NULL,
                'destacado' => 0,
                'destacado_title' => NULL,
                'precio_nuevo' => NULL,
                'button' => 'Más Información',
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
                'title' => 'Computer',
                'img_primaria' => 'content/catalog/MnfWdcDHo7E0sxVzJ9pcFtL4zmBDWcchy9wUZ6ph.png',
                'img_secundaria' => 'content/catalog/lK6RWXFx1zbaKSL0EhvkLudMfB1rMHMJQeaFgL78.png',
                'img_btn' => 'Electronic',
                'img_icon' => 'fas fa-search-plus',
                'precio' => NULL,
                'destacado' => 0,
                'destacado_title' => NULL,
                'precio_nuevo' => NULL,
                'button' => 'Más Información',
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
                'title' => 'Watches',
                'img_primaria' => 'content/catalog/DgGEVflMRaE3m19yELsgotjSZMVKmwmta1jJgsaV.png',
                'img_secundaria' => 'content/catalog/z84JSI5SawJSorHoMZM7QyP3ztU7MfXpmNzxG9Gr.png',
                'img_btn' => 'Acercar',
                'img_icon' => 'fas fa-search-plus',
                'precio' => NULL,
                'destacado' => 0,
                'destacado_title' => NULL,
                'precio_nuevo' => NULL,
                'button' => 'Más Información',
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