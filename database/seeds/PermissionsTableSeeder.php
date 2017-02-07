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
            1 => 
            array (
                'id' => 2,
                'name' => 'edit-area',
                'display_name' => 'Editar Areas',
                'description' => 'Permisos para editar areas',
                'created_at' => '2017-02-06 01:58:07',
                'updated_at' => '2017-02-06 01:58:11',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'create-firmas',
                'display_name' => 'Crear Firmas',
                'description' => 'Permiso para crear firmas',
                'created_at' => '2017-02-06 01:59:21',
                'updated_at' => '2017-02-06 01:59:26',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'edit-firmas',
                'display_name' => 'Editar Firmas',
                'description' => 'Permiso para la editar firmas',
                'created_at' => '2017-02-06 02:00:21',
                'updated_at' => '2017-02-06 02:00:23',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'create-categorias',
                'display_name' => 'Crear Categorias',
                'description' => 'Permiso para crear categorias',
                'created_at' => '2017-02-06 02:01:04',
                'updated_at' => '2017-02-06 02:01:05',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'edit-categorias',
                'display_name' => 'Editar Categorias',
                'description' => 'Permiso para editar categorias',
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
                'name' => 'show-bitacora',
                'display_name' => 'Ver Reporte de Actividades',
                'description' => 'Permiso para ver el reporte de actividades',
                'created_at' => '2017-02-06 02:04:50',
                'updated_at' => '2017-02-06 02:04:51',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'create-usuarios',
                'display_name' => 'Crear Usuarios',
                'description' => 'Permiso para crear usuarios',
                'created_at' => '2017-02-06 02:05:48',
                'updated_at' => '2017-02-06 02:05:51',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'edit-usuarios',
                'display_name' => 'Editar Usuarios',
                'description' => 'Permisos para editar usuarios',
                'created_at' => '2017-02-06 02:06:15',
                'updated_at' => '2017-02-06 02:06:22',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'show-users',
                'display_name' => 'Ver Usuarios',
                'description' => 'Permiso para ver usuarios',
                'created_at' => '2017-02-06 02:07:00',
                'updated_at' => '2017-02-06 02:07:04',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'show-reportes',
                'display_name' => 'Ver Reportes',
                'description' => 'Permiso para ver reportes',
                'created_at' => '2017-02-06 02:07:30',
                'updated_at' => '2017-02-06 02:07:34',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'show-citologias',
                'display_name' => 'Ver Citologias',
                'description' => 'Permiso para ver Histopatologías y Citologías ',
                'created_at' => '2017-02-06 02:08:16',
                'updated_at' => '2017-02-06 02:08:17',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'create-citologias',
                'display_name' => 'Crear Citologías',
                'description' => 'Permiso para crear Histopatologías y Citologías',
                'created_at' => '2017-02-06 02:10:48',
                'updated_at' => '2017-02-06 02:10:50',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => ' create-gravidad',
                'display_name' => 'Crear Gravidades',
                'description' => 'Permisos para la creación de Gravidades',
                'created_at' => '2017-02-07 13:31:30',
                'updated_at' => '2017-02-07 13:31:32',
            ),
        ));
        
        
    }
}