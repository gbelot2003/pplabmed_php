<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'create-area',
                'display_name' => 'Crear areas',
                'description' => 'Permisos para la creación de areas',
                'created_at' => '2017-02-06 07:36:44',
                'updated_at' => '2017-02-06 07:36:44',
            ),
        ));
        
        
    }
}