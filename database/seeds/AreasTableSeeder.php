<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('areas')->delete();
        
        \DB::table('areas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bill Emard',
                'status' => 1,
                'created_at' => '2017-02-05 06:29:23',
                'updated_at' => '2017-02-06 05:09:12',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Miss Halie Altenwerth I',
                'status' => 1,
                'created_at' => '2017-02-05 06:29:23',
                'updated_at' => '2017-02-06 04:41:14',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Miss Katlynn Goyette',
                'status' => 1,
                'created_at' => '2017-02-05 06:29:23',
                'updated_at' => '2017-02-06 04:41:08',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Dakota Mann',
                'status' => 1,
                'created_at' => '2017-02-05 06:29:23',
                'updated_at' => '2017-02-06 05:26:42',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Paolo Reinger',
                'status' => 1,
                'created_at' => '2017-02-05 06:29:23',
                'updated_at' => '2017-02-06 03:25:46',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Brandt Hintz',
                'status' => 1,
                'created_at' => '2017-02-05 06:29:23',
                'updated_at' => '2017-02-06 03:30:26',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Dr. Abigail Barrows Sr.',
                'status' => 1,
                'created_at' => '2017-02-05 06:29:23',
                'updated_at' => '2017-02-06 03:25:46',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Leon Kreiger',
                'status' => 1,
                'created_at' => '2017-02-05 06:29:23',
                'updated_at' => '2017-02-06 03:25:47',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Mrs. Elsa Walker',
                'status' => 1,
                'created_at' => '2017-02-05 06:29:23',
                'updated_at' => '2017-02-06 03:25:48',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Favian Denesik',
                'status' => 1,
                'created_at' => '2017-02-05 06:29:23',
                'updated_at' => '2017-02-05 06:29:23',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Cualquera se vale',
                'status' => 1,
                'created_at' => '2017-02-06 03:42:26',
                'updated_at' => '2017-02-06 04:23:43',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Areas22',
                'status' => 1,
                'created_at' => '2017-02-06 03:42:58',
                'updated_at' => '2017-02-06 05:42:55',
            ),
        ));
        
        
    }
}