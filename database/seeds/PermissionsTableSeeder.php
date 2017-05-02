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
                'name' => 'manage-cito',
                'display_name' => 'Gestionar Citología',
                'description' => 'Permisos para gestionar citología',
                'created_at' => '2017-02-06 07:36:44',
                'updated_at' => '2017-02-06 07:36:44',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'manage-histo',
                'display_name' => 'Gestionar Histopatología',
                'description' => 'Permisos para gestionar Hitopatología',
                'created_at' => '2017-02-06 01:58:07',
                'updated_at' => '2017-02-06 01:58:11',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'manage-ids',
                'display_name' => 'Gestionar Firmas',
                'description' => 'Permiso para crear firmas',
                'created_at' => '2017-02-06 01:59:21',
                'updated_at' => '2017-02-06 01:59:26',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'generate-reportes',
                'display_name' => 'Ver Reportes',
                'description' => 'Permisos para acceder a reportes',
                'created_at' => '2017-02-06 02:00:21',
                'updated_at' => '2017-02-06 02:00:23',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'manage-rols',
                'display_name' => 'Administrar Roles',
                'description' => 'Permiso para administrar roles',
                'created_at' => '2017-02-06 02:01:04',
                'updated_at' => '2017-02-06 02:01:05',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'manage-templates',
                'display_name' => 'Gestionar Plantillas',
                'description' => 'Permiso para gestionar plantillas',
                'created_at' => '2017-02-06 02:02:37',
                'updated_at' => '2017-02-06 02:02:38',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'create-roles',
                'display_name' => 'Crear Roles',
                'description' => 'Permiso para crear roles',
                'created_at' => '2017-02-06 02:03:37',
                'updated_at' => '2017-02-06 02:03:38',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'manage-users',
                'display_name' => 'Administrar Usuarios',
                'description' => 'Permiso para administrar usuarios',
                'created_at' => '2017-02-06 02:04:50',
                'updated_at' => '2017-02-06 02:04:51',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'show-fact',
                'display_name' => 'Ver Facturas',
                'description' => 'Permisos para revisar Facturas',
                'created_at' => '2017-02-06 02:06:15',
                'updated_at' => '2017-02-06 02:06:22',
            ),
        ));
        
        
    }
}