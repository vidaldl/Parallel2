<?php

use Illuminate\Database\Seeder;

class Shop2PortfolioItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('portfolio_items')->delete();
        
        \DB::table('portfolio_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Productos',
                'subtitle' => 'Una colección que muestra lo que ofrecemos',
                'logo' => 'content/portfolio/oFecFj08Syah9xSvhahCN3WCdBSWTrJa1J7MhDSC.png',
                'logo_link' => 0,
                'logo_link_type' => 0,
                'logo_link_address' => NULL,
                'screenshot' => 'content/portfolio/vwg5cHvYwhD6OX14HsyD0inmlvSjA75XlqV30k3n.png',
                'contenido' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><br></p><p><iframe width=" 480" height="270" src="https://www.youtube.com/embed/jjkth88ccSI?feature=oembed" frameborder="0" allowfullscreen="allowfullscreen"></iframe>&nbsp;<br></p><p><br></p><p>exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>',
                'author' => 'LEO VIDAL',
                'author_bio' => 'cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'link_title' => 'Más Información',
                'button_text' => 'Obténlo ahora',
                'button_icon' => 'fas fa-dollar-sign',
                'link' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Portfolio',
                'subtitle' => 'Finding out More',
                'logo' => 'content/portfolio/ui1FM0iYS09ZqyUlgTHvBLim2iuQXCrkIxojGk1K.png',
                'logo_link' => 0,
                'logo_link_type' => 0,
                'logo_link_address' => NULL,
                'screenshot' => 'content/portfolio/8YO7TzzCF1WuNfaVQINIfG1ppbxyxw9SqjzfU9GR.png',
                'contenido' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><br></p><p><iframe width=" 480" height="270" src="https://www.youtube.com/embed/jjkth88ccSI?feature=oembed" frameborder="0" allowfullscreen="allowfullscreen"></iframe>&nbsp;<br></p><p><br></p><p>exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'author' => 'Acerca del Autor',
                'author_bio' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'link_title' => 'More Info',
                'button_text' => 'More',
                'button_icon' => 'fas fa-question',
                'link' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Portfolio',
                'subtitle' => NULL,
                'logo' => NULL,
                'logo_link' => 0,
                'logo_link_type' => 0,
                'logo_link_address' => NULL,
                'screenshot' => NULL,
                'contenido' => NULL,
                'author' => NULL,
                'author_bio' => NULL,
                'link_title' => NULL,
                'button_text' => NULL,
                'button_icon' => NULL,
                'link' => NULL,
                'deleted_at' => '2020-01-23 20:34:52',
                'created_at' => NULL,
                'updated_at' => '2020-01-23 20:34:52',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Desarrollo',
                'subtitle' => 'Diseño, Planeación y Desarollo de Sistemas',
                'logo' => 'content/portfolio/dCJHcPHdpuiwxbXGHrIdVaq2c3s1felST8Qr3dps.png',
                'logo_link' => 0,
                'logo_link_type' => 0,
                'logo_link_address' => NULL,
                'screenshot' => 'content/portfolio/v3g1JhYMSHTrIqvQzPb4cDqpbPJVFoH5ylXVMhUV.png',
                'contenido' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><br></p><p><iframe width=" 480" height="270" src="https://www.youtube.com/embed/jjkth88ccSI?feature=oembed" frameborder="0" allowfullscreen="allowfullscreen"></iframe>&nbsp;<br></p><p><br></p><p>exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'author' => 'Company',
                'author_bio' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'link_title' => 'Más Información',
                'button_text' => 'Más',
                'button_icon' => 'fas fa-angle-double-right',
                'link' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}