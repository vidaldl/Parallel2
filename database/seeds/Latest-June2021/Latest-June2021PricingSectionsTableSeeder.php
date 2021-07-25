<?php

use Illuminate\Database\Seeder;

class Latest-June2021PricingSectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pricing_sections')->delete();
        
        \DB::table('pricing_sections')->insert(array (
            0 => 
            array (
                'id' => '1',
                'title' => 'Membresías',
                'subtitle' => 'Arrastra para más -->',
            ),
        ));
        
        
    }
}