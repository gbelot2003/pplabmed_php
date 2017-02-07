<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Administrador Génera',
                'description' => 'administrador Géneral de la aplicación',
                'created_at' => '2017-02-06 07:11:39',
                'updated_at' => '2017-02-07 19:37:12',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'sub admin',
                'display_name' => 'Sub Administrador',
                'description' => 'Con excepsión al area de seguidad, tiene acceso a todos las demas vistas',
                'created_at' => '2017-02-07 19:27:12',
                'updated_at' => '2017-02-07 19:27:12',
            ),
        ));
        
        
    }
}