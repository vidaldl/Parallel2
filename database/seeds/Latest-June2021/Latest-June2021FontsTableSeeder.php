<?php

use Illuminate\Database\Seeder;

class Latest-June2021FontsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fonts')->delete();
        
        \DB::table('fonts')->insert(array (
            0 => 
            array (
                'id' => '1',
                'element' => 'titles',
                'font_link' => NULL,
                'font_name' => 'Times New Roman',
            ),
            1 => 
            array (
                'id' => '2',
                'element' => 'body',
                'font_link' => NULL,
                'font_name' => 'Times New Roman',
            ),
        ));
        
        
    }
}