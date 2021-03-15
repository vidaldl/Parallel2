<?php

use Illuminate\Database\Seeder;

class Shop2CatalogItem3sTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('catalog_item3s')->delete();
        
        \DB::table('catalog_item3s')->insert(array (
            0 => 
            array (
                'id' => 2,
                'title' => 'Necklace',
                'img_primaria' => 'content/catalog/cdytD8BKC3o4JIzA58SaFv2VAQ1RF0ndXC5ub5Cf.png',
                'img_secundaria' => 'content/catalog/QhLhOZgI1Tke0JITZAmTq2sB8Cnmq4mUvLluner3.png',
                'img_btn' => 'Acercar',
                'img_icon' => 'fas fa-search-plus',
                'precio' => 250.0,
                'destacado' => 1,
                'destacado_title' => 'More',
                'precio_nuevo' => '450',
                'button' => 'Comprar Ahora',
                'button_icon' => 'fas fa-cart-plus',
                'button_link' => '#',
                'link_code' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'title' => 'Wrist Accessories',
                'img_primaria' => 'content/catalog/XmMF9ydHED69H8W3cBAquqASTBbZBaAPVWecguoz.png',
                'img_secundaria' => NULL,
                'img_btn' => 'Acercar',
                'img_icon' => 'fas fa-search-plus',
                'precio' => 120.0,
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
                'id' => 4,
                'title' => 'Cameras',
                'img_primaria' => 'content/catalog/syxdqp9Z8yO2L6XyvbjPRjr6Cx8Id32JDf4QJwPI.png',
                'img_secundaria' => 'content/catalog/8J95OOGwHGc7PKml50y3vK2wmWtIK25nRH9eVi8e.png',
                'img_btn' => 'Acercar',
                'img_icon' => 'fas fa-search-plus',
                'precio' => 60.0,
                'destacado' => 1,
                'destacado_title' => 'Mensual',
                'precio_nuevo' => '15',
                'button' => 'Más Información',
                'button_icon' => 'far fa-credit-card',
                'button_link' => '#',
                'link_code' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}