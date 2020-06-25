<?php

use Illuminate\Database\Seeder;

class ShopPortfolioCategoryPortfolioItemTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('portfolio_category_portfolio_item')->delete();
        
        \DB::table('portfolio_category_portfolio_item')->insert(array (
            0 => 
            array (
                'id' => 1,
                'portfolio_category_id' => 2,
                'portfolio_item_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'portfolio_category_id' => 3,
                'portfolio_item_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'portfolio_category_id' => 5,
                'portfolio_item_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}