<?php

use Illuminate\Database\Seeder;

class ContenidoSection5sTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contenido_section5s')->delete();
        
        \DB::table('contenido_section5s')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Contáctanos',
                'map' => 1,
                'map_iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15134.439606309257!2d-69.96693295000001!3d18.5013211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eaf8a2884a5277d%3A0x35aaa0d3e2e0d40!2sShell!5e0!3m2!1ses-419!2sdo!4v1589066660641!5m2!1ses-419!2sdo',
            'info' => '<address style="margin-bottom: 30px; line-height: 1.7;"><span style="color: rgb(0, 0, 0);">North America:<br>795 Folsom Ave, Suite 600<br>San Francisco, CA 94107.<br><br><abbr title="Phone Number" style="">Phone:</abbr>&nbsp;(91) 8547 632521<br><abbr title="Email Address" style="">Email:</abbr>&nbsp;real-estate@canvas.com</span></address><div class="clear topmargin-sm" style="clear: both; height: 0px; line-height: 0; width: 370px; overflow: hidden; margin-top: 30px !important;"></div><h4 class="font-body t500" style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 1.5;"><span style="color: rgb(0, 0, 0);">Working Hours:</span></h4><p><span style="color: rgb(0, 0, 0);"><abbr title="Mondays to Fridays" style="">Mon-Fri:</abbr>&nbsp;10AM to 6PM<br style=""><abbr title="Saturday" style="">Saturday:</abbr>&nbsp;11AM to 3PM<br style=""><abbr title="Sunday" style="">Sunday:</abbr>&nbsp;Closed</span><br></p>',
                'back_color' => '#e5e5e5',
                'back_form' => '#1abc9c',
                'name' => 'Name',
                'email' => 'Email',
                'phone' => 'Phone',
                'services' => 'Services',
                'subject' => 'Subject',
                'message' => 'Message',
                'send_button' => 'Send Message',
            ),
        ));
        
        
    }
}