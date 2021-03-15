<?php

use Illuminate\Database\Seeder;

class Shop2PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 3,
                'title' => 'Titulo del Articulo3',
                'description' => 'sdasd',
                'contenido' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'image' => 'posts/3.jpg',
                'category_id' => 2,
                'button' => 'Hello',
                'link' => '#articulos',
                'published_at' => '2019-08-05 00:00:00',
                'created_at' => '2019-06-23 00:17:24',
                'updated_at' => '2019-06-23 00:17:24',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 14,
                'title' => 'Leonel',
                'description' => 'asdasd',
                'contenido' => '<p><iframe frameborder="0" src="//www.youtube.com/embed/qAP1Do2Xpes" width="640" height="360" allowfullscreen="allowFullScreen" class="note-video-clip"></iframe><br></p>',
                'image' => 'content/posts//jMSKkdNus7Jxgr3ZkphEfShft6SItKqB3o78X1sI.png',
                'category_id' => 1,
                'button' => NULL,
                'link' => NULL,
                'published_at' => '2019-07-04 00:00:00',
                'created_at' => '2019-06-30 03:39:13',
                'updated_at' => '2019-07-04 17:58:17',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 15,
                'title' => 'gfghdghfgh',
                'description' => 'fghfghfg',
                'contenido' => '<p>hfghfghsda</p>',
                'image' => 'content/posts//F0mZbbE4DSsviVkkbCQRl6kE2Wm2zboDpjwvRQry.png',
                'category_id' => 3,
                'button' => NULL,
                'link' => NULL,
                'published_at' => '2019-07-22 00:00:00',
                'created_at' => '2019-07-22 04:52:44',
                'updated_at' => '2019-07-22 04:52:44',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 39,
                'title' => 'sdasdffffff',
                'description' => 'asdasd',
                'contenido' => '<p>asdasda</p>',
                'image' => 'content/posts//jnJ2h2f5J3gNuXj2FYNw0kXyHRk6NeOViYG2UKjT.png',
                'category_id' => 1,
                'button' => NULL,
                'link' => NULL,
                'published_at' => '2019-07-22 00:00:00',
                'created_at' => '2019-07-22 04:52:45',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 41,
                'title' => 'asdasd',
                'description' => 'asdsdasdasds',
                'contenido' => '<p>llklklklsdasd</p>',
                'image' => 'content/posts//5f6HpCy9kZr05gzBvutGk177CixTP3KxmBvDRlQF.png',
                'category_id' => 3,
                'button' => NULL,
                'link' => NULL,
                'published_at' => '2019-08-09 00:00:00',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 42,
                'title' => 'Cuename',
                'description' => 'Hola a todos me llamo Danilo Medina y el Gobierno necesita sangre nueva',
                'contenido' => '<p><iframe frameborder="0" src="//www.youtube.com/embed/RW57el6x8Hs" width="640" height="360" allowfullscreen="allowFullScreen" class="note-video-clip"></iframe></p>',
                'image' => 'content/posts//nB9CViLEBMpfaaAUnttzKT4hVM9oMiqD4Lent1F4.png',
                'category_id' => 2,
                'button' => 'Hello',
                'link' => '#inicio',
                'published_at' => '2019-08-09 00:00:00',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}