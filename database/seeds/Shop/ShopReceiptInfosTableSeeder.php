<?php

use Illuminate\Database\Seeder;

class ShopReceiptInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('receipt_infos')->delete();
        
        \DB::table('receipt_infos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'image' => 'content/shop/receipt/KvmpluTHrFuEzEagorUqM5KXeN3iMuvzmApFixLK.png',
                'company_name' => 'Parallel Shop',
                'address_line_1' => 'Calle Aguacate No. 23',
                'address_line_2' => 'Santo Domingo, Dominican Republic',
            ),
        ));
        
        
    }
}