<?php

use Illuminate\Database\Seeder;

class GravidadsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gravidads')->delete();
        
        \DB::table('gravidads')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'minima',
                'status' => 1,
                'created_at' => '2017-02-07 00:15:57',
                'updated_at' => '2017-02-07 00:15:57',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'voluptatem',
                'status' => 1,
                'created_at' => '2017-02-07 00:15:57',
                'updated_at' => '2017-02-07 00:15:57',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'praesentium',
                'status' => 1,
                'created_at' => '2017-02-07 00:15:57',
                'updated_at' => '2017-02-07 00:15:57',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'dolor',
                'status' => 1,
                'created_at' => '2017-02-07 00:15:57',
                'updated_at' => '2017-02-07 00:15:57',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'qui',
                'status' => 0,
                'created_at' => '2017-02-07 00:15:57',
                'updated_at' => '2017-02-07 00:15:57',
            ),
        ));
        
        
    }
}