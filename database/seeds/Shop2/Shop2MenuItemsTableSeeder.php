<?php

use Illuminate\Database\Seeder;

class Shop2MenuItemsTableSeeder extends Seeder
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
                'id' => 1,
                'logo' => 'content/menu/sW2xV6Wnt2D4P3kerwYRwPS1jKx1e8AkJMChWFnI.png',
                'logo_dark' => 'content/menu/zLtFcJ5Z2ACmgjQvZdsN70eWHovvAf9u0uKJCdlm.png',
                'item_inicio' => 'Inicio',
                'padding' => 120,
                'menu_style' => 1,
                'menu_borders' => 0,
                'menu_sticky' => 1,
            ),
        ));
        
        
    }
}