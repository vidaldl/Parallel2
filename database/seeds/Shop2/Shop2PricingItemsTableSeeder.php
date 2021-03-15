<?php

use Illuminate\Database\Seeder;

class Shop2PricingItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pricing_items')->delete();
        
        \DB::table('pricing_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'item' => 'Item 1',
            ),
            1 => 
            array (
                'id' => 2,
                'item' => 'Item 2',
            ),
            2 => 
            array (
                'id' => 3,
                'item' => 'Item 1',
            ),
            3 => 
            array (
                'id' => 4,
                'item' => 'Item 2',
            ),
            4 => 
            array (
                'id' => 5,
                'item' => 'Item 3',
            ),
            5 => 
            array (
                'id' => 6,
                'item' => 'Item 4',
            ),
            6 => 
            array (
                'id' => 7,
                'item' => 'Item 1',
            ),
            7 => 
            array (
                'id' => 8,
                'item' => 'Internet Ílimitado',
            ),
            8 => 
            array (
                'id' => 9,
                'item' => '100 SMS',
            ),
            9 => 
            array (
                'id' => 10,
                'item' => 'Item 4',
            ),
            10 => 
            array (
                'id' => 11,
                'item' => 'Item 5',
            ),
            11 => 
            array (
                'id' => 12,
                'item' => 'Item 6',
            ),
            12 => 
            array (
                'id' => 13,
                'item' => '500 minutos',
            ),
            13 => 
            array (
                'id' => 14,
                'item' => 'Item 2',
            ),
            14 => 
            array (
                'id' => 15,
                'item' => 'Item 3',
            ),
            15 => 
            array (
                'id' => 16,
                'item' => 'Item 3',
            ),
        ));
        
        
    }
}