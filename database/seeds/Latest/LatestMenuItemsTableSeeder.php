<?php

use Illuminate\Database\Seeder;

class LatestMenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => '1',
                'logo' => 'content/menu/yhoiqY71B6yeITWMun1Iruuv6sccv032ktzweRn0.png',
                'logo_dark' => 'content/menu/pDAbBWzBeEUAyw1PrOLTkzRvDLodlo7tK7hykQkY.png',
                'item_inicio' => 'Home',
                'padding' => '120',
                'menu_style' => '1',
                'menu_borders' => '0',
                'menu_sticky' => '1',
            ),
        ));
        
        
    }
}