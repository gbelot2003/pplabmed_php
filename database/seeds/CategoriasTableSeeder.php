<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categorias')->delete();
        
        \DB::table('categorias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'aut',
                'status' => 1,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-02-06 06:22:37',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'consequatur',
                'status' => 1,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-02-06 06:22:37',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'id',
                'status' => 1,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-02-06 06:22:37',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'ullam',
                'status' => 0,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-02-06 06:22:37',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'rerum',
                'status' => 1,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-02-06 06:22:37',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'ab',
                'status' => 0,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-02-06 06:22:37',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'et',
                'status' => 0,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-02-06 06:22:37',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'harum',
                'status' => 0,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-02-06 06:22:37',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'veniam',
                'status' => 1,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-02-06 06:23:54',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'aut',
                'status' => 1,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-02-06 06:22:37',
            ),
        ));
        
        
    }
}