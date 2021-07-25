<?php

use Illuminate\Database\Seeder;

class Latest-June2021UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => '1',
                'username' => 'admin',
                'email' => 'vidaldl63@gmail.com',
                'role' => 'admin',
                'email_verified_at' => NULL,
                'password' => '$2y$10$spkODgUDltrZCwMQOdcqtuX/xktrOk2yvIjOs7wyAkn6itb2ssF3S',
                'remember_token' => '9i2kLxP5dL69aQM3Ptdz6cxa0ZGbeJp4r1CNLP26dEZ8OKjhzKo8Q4gje5Li',
                'created_at' => '2019-06-23 00:17:24',
                'updated_at' => '2019-11-16 15:57:44',
            ),
        ));
        
        
    }
}