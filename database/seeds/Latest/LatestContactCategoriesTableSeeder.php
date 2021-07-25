<?php

use Illuminate\Database\Seeder;

class LatestContactCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contact_categories')->delete();
        
        \DB::table('contact_categories')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Design',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Interior and Exterior Construction',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Residential and Commercial',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'New Buildings and Renovations',
            ),
        ));
        
        
    }
}