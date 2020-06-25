<?php

use Illuminate\Database\Seeder;

class DemoContentPricingPricingItemTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pricing_pricing_item')->delete();
        
        \DB::table('pricing_pricing_item')->insert(array (
            0 => 
            array (
                'id' => 1,
                'pricing_id' => 1,
                'pricing_item_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'pricing_id' => 1,
                'pricing_item_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'pricing_id' => 2,
                'pricing_item_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'pricing_id' => 2,
                'pricing_item_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'pricing_id' => 2,
                'pricing_item_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'pricing_id' => 2,
                'pricing_item_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'pricing_id' => 4,
                'pricing_item_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'pricing_id' => 4,
                'pricing_item_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'pricing_id' => 4,
                'pricing_item_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'pricing_id' => 4,
                'pricing_item_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'pricing_id' => 4,
                'pricing_item_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'pricing_id' => 4,
                'pricing_item_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'pricing_id' => 5,
                'pricing_item_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'pricing_id' => 5,
                'pricing_item_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'pricing_id' => 5,
                'pricing_item_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'pricing_id' => 1,
                'pricing_item_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}