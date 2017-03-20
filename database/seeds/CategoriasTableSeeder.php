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
        

        \DB::table('Categorias')->delete();
        
        \DB::table('Categorias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Negativo',
                'status' => 1,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-03-14 15:36:58',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Bajo Gradro NIC I',
                'status' => 1,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-03-14 15:37:22',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Alto Grado NIC II',
                'status' => 1,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-03-14 15:37:45',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'CA "IN SITO" NIC III',
                'status' => 1,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-03-14 15:38:09',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'A TIPIADA DE SIGNIFICADO NO DETERMINADO',
                'status' => 1,
                'created_at' => '2017-02-06 06:22:37',
                'updated_at' => '2017-03-14 15:39:14',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Ascus',
                'status' => 1,
                'created_at' => '2017-03-20 11:29:55',
                'updated_at' => '2017-03-20 11:29:55',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'LCR',
                'status' => 1,
                'created_at' => '2017-03-20 11:30:23',
                'updated_at' => '2017-03-20 11:30:23',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'Carcioma Invasor',
                'status' => 1,
                'created_at' => '2017-03-20 11:30:47',
                'updated_at' => '2017-03-20 11:30:47',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'Otros Sitios',
                'status' => 1,
                'created_at' => '2017-03-20 11:31:12',
                'updated_at' => '2017-03-20 11:31:12',
            ),
        ));
        
        
    }
}