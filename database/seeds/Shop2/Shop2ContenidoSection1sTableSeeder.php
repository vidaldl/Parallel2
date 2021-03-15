<?php

use Illuminate\Database\Seeder;

class Shop2ContenidoSection1sTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contenido_section1s')->delete();
        
        \DB::table('contenido_section1s')->insert(array (
            0 => 
            array (
                'id' => 1,
                'logo' => 'content/pVbWX3vnrR0jwBlDLqMLpBYRzHYng0bACa2auzbQ.png',
                'background_image' => 'content/tVp6RN9kA5bvEPPyybyK1sVO3n3E9tC2TJO9gD5T.png',
                'title' => 'Company name',
                'tagline' => 'Company Slogan',
                'button' => 'More Information',
                'link' => '#infoSlider',
                'display' => 1,
                'carousel' => 0,
                'style' => 1,
                'title_size' => 60,
                'subtitle_size' => 32,
                'overlay' => 65,
            ),
            1 => 
            array (
                'id' => 3,
                'logo' => 'content/KvYh7b5Yqs5ZXl19vd6oJViuk6vms3g7msZcHVR3.png',
                'background_image' => 'content/8VZMDNA2kNnD1SfFS5H1xD7b6ZgIgbayIMpjYiJt.png',
                'title' => 'Titulo Opcional',
                'tagline' => 'Frase o Slogan de la Empresa',
                'button' => 'Conoce Nuestros Servicios',
                'link' => 'http://www.google.com',
                'display' => 0,
                'carousel' => 1,
                'style' => 1,
                'title_size' => 60,
                'subtitle_size' => 32,
                'overlay' => 65,
            ),
            2 => 
            array (
                'id' => 4,
                'logo' => 'content/12e7PK2GNPdPc8usFgbqcTgEhTJAiEwtH3eWCqrZ.png',
                'background_image' => 'content/M4jqmkwdvdwnk4d2s87CkFDzjQ8Xwb6aTpIy6gcu.png',
                'title' => 'Titulo Opcional',
                'tagline' => 'Frase o Slogan de la Empresa',
                'button' => 'Hola',
                'link' => '#infoSlider',
                'display' => 0,
                'carousel' => 1,
                'style' => 1,
                'title_size' => 60,
                'subtitle_size' => 32,
                'overlay' => 65,
            ),
            3 => 
            array (
                'id' => 5,
                'logo' => 'content/URJGZzHD7hf7t7jOnXg1o7IUISK6tV55AbPwms45.png',
                'background_image' => 'content/X5Qk4eJmzeG9OxxeIypcSmJzxSKj4NvpGWTcTnK7.png',
                'title' => 'Titulo Opcional',
                'tagline' => 'Más información sobre todo',
                'button' => 'asdasdasd',
                'link' => '#contact',
                'display' => 0,
                'carousel' => 1,
                'style' => 1,
                'title_size' => 60,
                'subtitle_size' => 32,
                'overlay' => 65,
            ),
        ));
        
        
    }
}