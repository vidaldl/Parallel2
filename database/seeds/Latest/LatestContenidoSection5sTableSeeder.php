<?php

use Illuminate\Database\Seeder;

class LatestContenidoSection5sTableSeeder extends Seeder
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
                'id' => '1',
                'title' => 'Get in Touch',
                'success' => 'successs',
                'errors' => 'errors',
                'map' => '1',
                'map_iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY!5e0!3m2!1sen!2sus!4v1622934065117!5m2!1sen!2sus',
            'info' => '<address style="margin-bottom: 30px; line-height: 1.7;"><span style="color: rgb(0, 0, 0);"><abbr title="Phone Number" style="">Phone:</abbr>&nbsp;<br>(917) 443 4644<br><br><abbr title="Email Address" style="">Email:</abbr>&nbsp;<br>ramon.mercedes@gmail.com<br>ramonmercedes@adcon-inc.om</span></address><address style="margin-bottom: 30px; line-height: 1.7;"><span style="color: rgb(0, 0, 0);">New York, United States.</span></address><div class="clear topmargin-sm" style="clear: both; height: 0px; line-height: 0; width: 370px; overflow: hidden; margin-top: 30px !important;"></div><h4 class="font-body t500" style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 1.5;"><br></h4>',
                'back_color' => '#e5e5e5',
                'back_form' => '#ffffff',
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