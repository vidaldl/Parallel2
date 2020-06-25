<?php

use Illuminate\Database\Seeder;

class ShopReceiptShopItemTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('receipt_shop_item')->delete();
        
        \DB::table('receipt_shop_item')->insert(array (
            0 => 
            array (
                'id' => 1,
                'receipt_id' => 1,
                'shop_item_id' => 7,
                'item_qty' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'receipt_id' => 1,
                'shop_item_id' => 5,
                'item_qty' => 1,
            ),
        ));
        
        
    }
}