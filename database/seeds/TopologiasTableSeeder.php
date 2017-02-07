<?php

use Illuminate\Database\Seeder;

class TopologiasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('topologias')->delete();
        
        \DB::table('topologias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'voluptatem',
                'status' => 0,
                'created_at' => '2017-02-07 00:15:45',
                'updated_at' => '2017-02-07 00:15:45',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'excepturi',
                'status' => 0,
                'created_at' => '2017-02-07 00:15:46',
                'updated_at' => '2017-02-07 00:15:46',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'sed',
                'status' => 0,
                'created_at' => '2017-02-07 00:15:46',
                'updated_at' => '2017-02-07 00:15:46',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'aperiam',
                'status' => 1,
                'created_at' => '2017-02-07 00:15:46',
                'updated_at' => '2017-02-07 00:15:46',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'molestias',
                'status' => 0,
                'created_at' => '2017-02-07 00:15:46',
                'updated_at' => '2017-02-07 00:15:46',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'excepturi',
                'status' => 0,
                'created_at' => '2017-02-07 00:15:46',
                'updated_at' => '2017-02-07 00:15:46',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'neque',
                'status' => 1,
                'created_at' => '2017-02-07 00:15:46',
                'updated_at' => '2017-02-07 00:15:46',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'et',
                'status' => 0,
                'created_at' => '2017-02-07 00:15:46',
                'updated_at' => '2017-02-07 00:15:46',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'deserunt',
                'status' => 0,
                'created_at' => '2017-02-07 00:15:46',
                'updated_at' => '2017-02-07 00:15:46',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'sed',
                'status' => 1,
                'created_at' => '2017-02-07 00:15:46',
                'updated_at' => '2017-02-07 00:15:46',
            ),
        ));
        
        
    }
}