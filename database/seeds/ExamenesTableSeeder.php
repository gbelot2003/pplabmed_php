<?php

use Illuminate\Database\Seeder;

class ExamenesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('examenes')->delete();
        
        \DB::table('examenes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'num_factura' => 159,
                'nombre_examen' => 'Cit. Aspiracion  Hasta 4 Laminas',
                'created_at' => '2017-03-22 05:23:38',
                'updated_at' => '2017-03-22 05:23:38',
            ),
            1 => 
            array (
                'id' => 2,
                'num_factura' => 156,
                'nombre_examen' => 'Cit. Aspiracion  Hasta 4 Laminas Despues De 5.P.M. Por Revision De Frotis Adec.',
                'created_at' => '2017-03-22 05:23:38',
                'updated_at' => '2017-03-22 05:23:38',
            ),
            2 => 
            array (
                'id' => 3,
                'num_factura' => 151,
                'nombre_examen' => 'Cit. Aspiracion  Hasta 4 Laminas Despues De 5.P.M. Por Revision De Frotis Adec.',
                'created_at' => '2017-03-22 05:23:39',
                'updated_at' => '2017-03-22 05:23:39',
            ),
            3 => 
            array (
                'id' => 4,
                'num_factura' => 110,
                'nombre_examen' => 'Cit. Aspiracion  Hasta 4 Laminas Despues De 5.P.M. Por Revision De Frotis Adec.',
                'created_at' => '2017-03-22 05:23:39',
                'updated_at' => '2017-03-22 05:23:39',
            ),
            4 => 
            array (
                'id' => 5,
                'num_factura' => 132,
                'nombre_examen' => 'Cit. Aspiracion  Hasta 4 Laminas Despues De 5.P.M. Por Revision De Frotis Adec.',
                'created_at' => '2017-03-22 05:24:39',
                'updated_at' => '2017-03-22 05:24:39',
            ),
        ));
        
        
    }
}