<?php

use Illuminate\Database\Seeder;

class LinkImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('link_images')->delete();
        
        \DB::table('link_images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'created_at' => '2017-03-16 21:10:21',
                'updated_at' => '2017-03-16 21:10:21',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'created_at' => '2017-03-16 15:10:57',
                'updated_at' => '2017-03-16 15:11:01',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'created_at' => '2017-03-16 15:10:58',
                'updated_at' => '2017-03-16 15:11:02',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'created_at' => '2017-03-16 21:10:49',
                'updated_at' => '2017-03-16 21:10:49',
            ),
        ));
        
        
    }
}