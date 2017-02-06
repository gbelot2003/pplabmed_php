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
                'name' => 'Gerardo',
                'email' => 'gbelot2003@hotmail.com',
                'password' => '$2y$10$LcknuRPTG3zADQ.yg5tWNOG.JSSp5V8rijUlFZYmM.hjx.DM7u6I.',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2017-02-05 06:33:40',
                'updated_at' => '2017-02-05 06:33:40',
            ),
        ));
        
        
    }
}