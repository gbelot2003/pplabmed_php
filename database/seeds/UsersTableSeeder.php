<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'id' => 1,
                'username' => 'gbelot',
                'email' => 'gbelot2003@hotmail.com',
                'password' => '$2y$10$LcknuRPTG3zADQ.yg5tWNOG.JSSp5V8rijUlFZYmM.hjx.DM7u6I.',
                'status' => 1,
                'remember_token' => 'LzWt0hCgDozn419dI7wXnXQJbMItxxNeg3YGMmsKjAPPh3VtxMBlWpOi6Ena',
                'created_at' => '2017-02-05 06:33:40',
                'updated_at' => '2017-02-05 06:33:40',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'admin',
                'email' => 'admin@yahoo.com',
                'password' => '$2y$10$H43IwqZjemo7AInZNyKZm.2g6fOXLoUwlLomlIhzaAkfVA74WG/tO',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2017-02-07 19:21:56',
                'updated_at' => '2017-02-07 19:23:39',
            ),
            2 => 
            array (
                'id' => 3,
                'username' => 'ekibyo',
                'email' => 'cmorales@sinergiacala.net',
                'password' => '$2y$10$wGLTagQQii/9XnFSISDhqOoAyQ9uw/aqvfH4a7cX9qMS5rXu5KkaK',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2017-02-08 15:07:21',
                'updated_at' => '2017-02-08 15:08:18',
            ),
            3 => 
            array (
                'id' => 4,
                'username' => 'ealvarez',
                'email' => 'edithalvarez@laboratoriosmedicos.hn',
                'password' => '$2y$10$BXnTCamfE8mwbvk/qao/X.lAqV2UdFxdEHKQD/.koMIe.yMg1KkeS',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2017-03-08 15:28:08',
                'updated_at' => '2017-03-08 15:28:08',
            ),
        ));
        
        
    }
}