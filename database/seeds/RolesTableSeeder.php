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
                'display_name' => 'administrador Géneral',
                'description' => 'administrador Géneral de la aplicación',
                'created_at' => '2017-02-06 07:11:39',
                'updated_at' => '2017-02-06 07:11:39',
            ),
        ));
        
        
    }
}