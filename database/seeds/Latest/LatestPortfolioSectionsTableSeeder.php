<?php

use Illuminate\Database\Seeder;

class LatestPortfolioSectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('portfolio_sections')->delete();
        
        \DB::table('portfolio_sections')->insert(array (
            0 => 
            array (
                'id' => '1',
                'title' => 'Portfolio',
                'filter' => '0',
            ),
        ));
        
        
    }
}