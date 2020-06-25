<?php

use Illuminate\Database\Seeder;

class ShopLinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('links')->delete();
        
        \DB::table('links')->insert(array (
            0 => 
            array (
                'id' => 5,
                'image' => 'content/links/iQ4DMrxxwXfNXG7DdB6vOSEG2Wa9kyoLZ3evnw9h.png',
                'title' => 'Aduanas',
                'link' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-08-16 16:18:05',
                'updated_at' => '2020-02-11 06:13:07',
            ),
            1 => 
            array (
                'id' => 10,
                'image' => 'content/links/iD4TdC0zCGx9DXOB2JOgZMAMLQvNvIibsfM7c64w.png',
                'title' => 'Google',
                'link' => '#contact',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 11,
                'image' => 'content/links/0DXlptL8pUhZHajZalvtHW96tjgcHsjqFmfVXlqt.png',
                'title' => 'Impuestos Internos',
                'link' => '#servicios',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 12,
                'image' => 'content/links/xnWQQ5OCyftMGsJigFXzc1Fe1WLgpo06Xqj4zsMi.png',
                'title' => 'Super Tucano Inter.',
                'link' => 'google.com',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 13,
                'image' => 'content/links/9vvpwb72rPX9xyurpuJ7qTRuo1YOtCwxfOBlP577.png',
                'title' => 'Grupo Ramos',
                'link' => 'http://google.com',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 14,
                'image' => 'content/links/B8YXyptdFEBlOeGE9hY61tEiEeftfc3qpFDtXLoE.png',
                'title' => 'Madre Tierra',
                'link' => 'http://google.com',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}