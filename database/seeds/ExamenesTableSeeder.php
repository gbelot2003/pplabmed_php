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
                'num_factura' => 113,
                'item' => 54,
                'nombre_examen' => 'Aspiracion  Hasta 4 Laminas Despues De 5.P.M. Base Liquida',
                'created_at' => '2017-03-22 05:23:38',
                'updated_at' => '2017-03-22 05:23:38',
            ),
            1 => 
            array (
                'id' => 2,
                'num_factura' => 177,
                'item' => 65,
                'nombre_examen' => 'Cit. Aspiracion  Hasta 4 Laminas Despues De 5.P.M. Por Revision De Frotis Adec.',
                'created_at' => '2017-03-22 05:23:38',
                'updated_at' => '2017-03-22 05:23:38',
            ),
            2 => 
            array (
                'id' => 3,
                'num_factura' => 110,
                'item' => 55,
                'nombre_examen' => 'Aspiracion  Hasta 4 Laminas Despues De 5.P.M. Base Liquida',
                'created_at' => '2017-03-22 05:23:39',
                'updated_at' => '2017-03-22 05:23:39',
            ),
            3 => 
            array (
                'id' => 4,
                'num_factura' => 132,
                'item' => 65,
                'nombre_examen' => 'Cit. Aspiracion  Hasta 4 Laminas Despues De 5.P.M. Por Revision De Frotis Adec.',
                'created_at' => '2017-03-22 05:23:39',
                'updated_at' => '2017-03-22 05:23:39',
            ),
            4 => 
            array (
                'id' => 5,
                'num_factura' => 151,
                'item' => 55,
                'nombre_examen' => 'Aspiracion  Hasta 4 Laminas Despues De 5.P.M. Base Liquida',
                'created_at' => '2017-03-22 05:24:39',
                'updated_at' => '2017-03-22 05:24:39',
            ),
            5 => 
            array (
                'id' => 6,
                'num_factura' => 156,
                'item' => 60,
                'nombre_examen' => 'Cit. Aspiracion  Hasta 4 Laminas Despues De 5.P.M. Por Revision De Frotis Adec.',
                'created_at' => '2017-04-06 10:01:14',
                'updated_at' => '2017-04-06 10:01:22',
            ),
            6 => 
            array (
                'id' => 7,
                'num_factura' => 159,
                'item' => 55,
                'nombre_examen' => 'Aspiracion  Hasta 4 Laminas Despues De 5.P.M. Base Liquida',
                'created_at' => '2017-04-06 10:01:16',
                'updated_at' => '2017-04-06 10:01:22',
            ),
            7 => 
            array (
                'id' => 8,
                'num_factura' => 196,
                'item' => 60,
                'nombre_examen' => 'Cit. Aspiracion  Hasta 4 Laminas Despues De 5.P.M. Por Revision De Frotis Adec.',
                'created_at' => '2017-04-06 10:01:17',
                'updated_at' => '2017-04-06 10:01:23',
            ),
            8 => 
            array (
                'id' => 9,
                'num_factura' => 199,
                'item' => 55,
                'nombre_examen' => 'Aspiracion  Hasta 4 Laminas Despues De 5.P.M. Base Liquida',
                'created_at' => '2017-04-06 10:01:17',
                'updated_at' => '2017-04-06 10:01:20',
            ),
        ));
        
        
    }
}