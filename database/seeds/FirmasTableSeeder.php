<?php

use Illuminate\Database\Seeder;

class FirmasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('firmas')->delete();
        
        \DB::table('firmas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'DRA. JUANA A. ALVARADO',
                'code' => 'Colegiado No. 4905',
                'status' => 1,
                'created_at' => '2017-02-06 05:15:12',
                'updated_at' => '2017-02-06 05:45:12',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'DR DANILO ALVARADO
',
                'code' => 'Colegiado No. 601
',
                'status' => 1,
                'created_at' => '2017-02-06 05:15:12',
                'updated_at' => '2017-02-06 05:45:11',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'DRA. REINA I. RIVERA
',
                'code' => 'Colegiado NO.6667
',
                'status' => 1,
                'created_at' => '2017-02-06 05:15:12',
                'updated_at' => '2017-02-06 05:15:12',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'DRA. DAYSI CASTRO
',
                'code' => 'Colegiado No.5453
',
                'status' => 1,
                'created_at' => '2017-02-06 05:15:12',
                'updated_at' => '2017-02-06 05:15:12',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'DRA. XIOMARA TEJADA
',
                'code' => 'Colegiado NO.6832',
                'status' => 1,
                'created_at' => '2017-02-06 05:15:13',
                'updated_at' => '2017-02-06 05:15:13',
            ),
        ));
        
        
    }
}