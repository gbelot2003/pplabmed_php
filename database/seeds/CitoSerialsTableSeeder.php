<?php

use Illuminate\Database\Seeder;

class CitoSerialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cito_serials')->delete();
        
        \DB::table('cito_serials')->insert(array (
            0 => 
            array (
                'id' => 1,
                'serial' => 8,
                'created_at' => '2017-03-06 00:09:36',
                'updated_at' => '2017-03-10 21:48:30',
            ),
            1 => 
            array (
                'id' => 2,
                'serial' => 2,
                'created_at' => '2017-03-06 00:09:47',
                'updated_at' => '2017-03-06 00:09:47',
            ),
        ));
        
        
    }
}