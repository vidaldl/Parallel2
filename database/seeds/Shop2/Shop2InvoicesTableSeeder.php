<?php

use Illuminate\Database\Seeder;

class Shop2InvoicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('invoices')->delete();
        
        \DB::table('invoices')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Order #1 Invoice',
                'price' => 20.0,
                'payment_status' => 'Completed',
                'recurring_id' => NULL,
                'created_at' => '2020-06-22 22:07:54',
                'updated_at' => '2020-06-22 22:09:18',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Order #2 Invoice',
                'price' => 20.0,
                'payment_status' => NULL,
                'recurring_id' => NULL,
                'created_at' => '2020-06-22 22:19:42',
                'updated_at' => '2020-06-22 22:19:42',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Order #3 Invoice',
                'price' => 20.0,
                'payment_status' => NULL,
                'recurring_id' => NULL,
                'created_at' => '2020-06-22 22:19:43',
                'updated_at' => '2020-06-22 22:19:43',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Order #4 Invoice',
                'price' => 20.0,
                'payment_status' => NULL,
                'recurring_id' => NULL,
                'created_at' => '2020-06-23 02:15:56',
                'updated_at' => '2020-06-23 02:15:56',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Order #5 Invoice',
                'price' => 20.0,
                'payment_status' => NULL,
                'recurring_id' => NULL,
                'created_at' => '2020-06-24 15:00:29',
                'updated_at' => '2020-06-24 15:00:29',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Order #6 Invoice',
                'price' => 20.0,
                'payment_status' => NULL,
                'recurring_id' => NULL,
                'created_at' => '2020-06-24 15:19:37',
                'updated_at' => '2020-06-24 15:19:37',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Order #7 Invoice',
                'price' => 20.0,
                'payment_status' => NULL,
                'recurring_id' => NULL,
                'created_at' => '2020-06-24 15:33:11',
                'updated_at' => '2020-06-24 15:33:11',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Order #8 Invoice',
                'price' => 20.0,
                'payment_status' => NULL,
                'recurring_id' => NULL,
                'created_at' => '2020-06-24 15:33:11',
                'updated_at' => '2020-06-24 15:33:11',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Order #9 Invoice',
                'price' => 20.0,
                'payment_status' => NULL,
                'recurring_id' => NULL,
                'created_at' => '2020-06-24 15:34:12',
                'updated_at' => '2020-06-24 15:34:12',
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Order #10',
                'price' => 56997.0,
                'payment_status' => NULL,
                'recurring_id' => NULL,
                'created_at' => '2020-06-24 17:00:15',
                'updated_at' => '2020-06-24 17:00:15',
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Order #11',
                'price' => 56997.0,
                'payment_status' => NULL,
                'recurring_id' => NULL,
                'created_at' => '2020-06-24 17:00:32',
                'updated_at' => '2020-06-24 17:00:32',
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Order #12',
                'price' => 56997.0,
                'payment_status' => NULL,
                'recurring_id' => NULL,
                'created_at' => '2020-06-24 17:49:27',
                'updated_at' => '2020-06-24 17:49:27',
            ),
        ));
        
        
    }
}