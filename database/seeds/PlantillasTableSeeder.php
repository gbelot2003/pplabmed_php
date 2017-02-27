<?php

use Illuminate\Database\Seeder;

class PlantillasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('plantillas')->delete();
        
        \DB::table('plantillas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Primera Plnatilla',
                'body' => '<p>Esta es una plantilla, dentro de los recuadros deberia agregrar contenido [dentro de estos recuadros se puede agregar en contenido]. Los recuadros [] pueden o no estar, solo avisan del &aacute;rea donde se debe agregar el contenido deseado.</p>',
                'type' => 1,
                'status' => 1,
                'created_at' => '2017-02-27 15:45:27',
                'updated_at' => '2017-02-27 16:02:55',
            ),
        ));
        
        
    }
}