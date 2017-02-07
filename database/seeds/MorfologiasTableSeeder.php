<?php

use Illuminate\Database\Seeder;

class MorfologiasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('morfologias')->delete();
        
        \DB::table('morfologias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'est',
                'status' => 0,
                'created_at' => '2017-02-07 00:15:36',
                'updated_at' => '2017-02-07 00:15:36',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'ut',
                'status' => 0,
                'created_at' => '2017-02-07 00:15:36',
                'updated_at' => '2017-02-07 00:15:36',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'ex',
                'status' => 1,
                'created_at' => '2017-02-07 00:15:36',
                'updated_at' => '2017-02-07 00:15:36',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'temporibus',
                'status' => 0,
                'created_at' => '2017-02-07 00:15:36',
                'updated_at' => '2017-02-07 00:15:36',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'commodi',
                'status' => 0,
                'created_at' => '2017-02-07 00:15:36',
                'updated_at' => '2017-02-07 00:15:36',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'molestiae',
                'status' => 0,
                'created_at' => '2017-02-07 00:15:36',
                'updated_at' => '2017-02-07 00:15:36',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'sint',
                'status' => 1,
                'created_at' => '2017-02-07 00:15:36',
                'updated_at' => '2017-02-07 00:15:36',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'adipisci',
                'status' => 1,
                'created_at' => '2017-02-07 00:15:36',
                'updated_at' => '2017-02-07 00:15:36',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'unde',
                'status' => 1,
                'created_at' => '2017-02-07 00:15:36',
                'updated_at' => '2017-02-07 00:15:36',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'cum',
                'status' => 1,
                'created_at' => '2017-02-07 00:15:36',
                'updated_at' => '2017-02-07 00:15:36',
            ),
        ));
        
        
    }
}