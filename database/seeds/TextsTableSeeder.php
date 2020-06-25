<?php

use Illuminate\Database\Seeder;

class TextsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('texts')->delete();
        
        \DB::table('texts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'text' => '<h2>Seccion de Texto
Muestra a todos lo que tienes para Ofrecer con esta Sección de Parallel Cloud.&nbsp;</h2><p><span style="font-size: large;">&nbsp;A la izquierda...&nbsp;</span></p><p style="text-align: center; "><span style="font-size: large;">Centrado...</span></p><p></p><p style="text-align: right;"><span style="font-size: large; font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;">A la derecha...</span></p><table class="table" style="width: 1132.22px; text-align: center;"><tbody><tr><td>Product id</td><td>Product</td><td>Name</td></tr><tr><td>1039</td><td>Cool Website</td><td>&nbsp;Parallel Cloud</td></tr><tr><td>1040</td><td>Super Cool Website</td><td>Parallel Cloud(Duh)</td></tr></tbody></table><p></p>',
                'back_color' => '#f1f1f1',
            ),
        ));
        
        
    }
}