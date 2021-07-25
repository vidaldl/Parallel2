<?php

use Illuminate\Database\Seeder;

class Latest-June2021PortfolioCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('portfolio_categories')->delete();
        
        \DB::table('portfolio_categories')->insert(array (
            0 => 
            array (
                'id' => '2',
                'name' => 'Medico',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => '3',
                'name' => 'Nómina',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => '5',
                'name' => 'Desarrollo',
                'created_at' => '2019-12-30 14:20:51',
                'updated_at' => '2020-01-23 20:39:40',
            ),
        ));
        
        
    }
}