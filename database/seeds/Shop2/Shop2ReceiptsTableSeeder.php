<?php

use Illuminate\Database\Seeder;

class Shop2ReceiptsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('receipts')->delete();
        
        \DB::table('receipts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'receipt_number' => 1,
                'description' => 'description',
                'date' => '23-06-2020',
                'client_name' => 'David Vidal',
                'client_email' => 'vidaldl@outlook.com',
                'method' => 'card',
                'card_type' => 'visa',
                'card_last4' => '4242',
                'subtotal' => '56,997.00',
                'tax' => '10,259.46',
                'total' => '67,256.46',
                'payment_status' => NULL,
                'recurring_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}