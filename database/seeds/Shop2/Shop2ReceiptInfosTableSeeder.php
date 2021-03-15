<?php

use Illuminate\Database\Seeder;

class Shop2ReceiptInfosTableSeeder extends Seeder
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
                'image' => 'content/shop/receipt/XbhPqjfiN7Bu6DwbojvGgO2rYmVkhzZ5BNfNNbHz.png',
                'company_name' => 'Parallel Shop',
                'address_line_1' => 'Calle Aguacate No. 23',
                'address_line_2' => 'Santo Domingo, Dominican Republic',
            ),
        ));
        
        
    }
}