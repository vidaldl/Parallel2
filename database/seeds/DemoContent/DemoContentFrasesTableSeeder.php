<?php

use Illuminate\Database\Seeder;

class DemoContentFrasesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('frases')->delete();
        
        \DB::table('frases')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => '"ELIGE LO SIMPLE"',
            ),
        ));
        
        
    }
}