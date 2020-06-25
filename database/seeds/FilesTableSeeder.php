<?php

use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('files')->delete();
        
        \DB::table('files')->insert(array (
            0 => 
            array (
                'id' => 1,
                'file' => 'files/xRCRgjD8K80Xo3fUfF3pG0DvjhwWjKFk00CQXTBQ.pdf',
                'display_name' => 'CEM FORMAL PRESENTATION & CATALOG - COVID-19.pdf.pdf',
            ),
            1 => 
            array (
                'id' => 2,
                'file' => 'files/eJWrF15TOjpRGKkP67w0a25Ep6yN9QnJNVQYZX1z.pdf',
                'display_name' => '12 reglas.pdf',
            ),
            2 => 
            array (
                'id' => 3,
                'file' => 'files/SsstCQLPidIeGZxDXfNqzi9ARb1X75tPVuQ0Q5Ta.bin',
                'display_name' => 'FPS hands.blend',
            ),
        ));
        
        
    }
}