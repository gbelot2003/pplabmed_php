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
                'name' => 'show-cito',
                'display_name' => 'Ver Citologias',
                'description' => 'Permiso para ver Histopatologías y Citologías ',
                'created_at' => '2017-02-06 02:08:16',
                'updated_at' => '2017-02-06 02:08:17',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'create-cito',
                'display_name' => 'Crear Citologías',
                'description' => 'Permiso para crear Histopatologías y Citologías',
                'created_at' => '2017-02-06 02:10:48',
                'updated_at' => '2017-02-06 02:10:50',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'create-gravidad',
                'display_name' => 'Crear Gravidades',
                'description' => 'Permisos para la creación de Gravidades',
                'created_at' => '2017-02-07 13:31:30',
                'updated_at' => '2017-02-07 13:31:32',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'edit-gravidad',
                'display_name' => 'Editar Gravidad',
                'description' => 'Permisos para la edición de Gravidades',
                'created_at' => '2017-02-07 15:11:04',
                'updated_at' => '2017-02-07 15:11:05',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'create-morfologia',
                'display_name' => 'Crear Morfologías',
                'description' => 'Permisos para crear Morfoloías',
                'created_at' => '2017-02-07 15:12:30',
                'updated_at' => '2017-02-07 15:12:37',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'create-topologia',
                'display_name' => 'Create Topologías',
                'description' => 'Permisos para la edición de Topografias',
                'created_at' => '2017-02-07 15:14:09',
                'updated_at' => '2017-02-07 15:14:10',
            ),
            18 => 
            array (
                'id' => 20,
                'name' => 'edit-morfologia',
                'display_name' => 'Editar Morfologias',
                'description' => 'Permisos para editar Morfologías',
                'created_at' => '2017-02-07 15:15:09',
                'updated_at' => '2017-02-07 15:15:10',
            ),
            19 => 
            array (
                'id' => 21,
                'name' => 'edit-topologias',
                'display_name' => 'Editar Topologias',
                'description' => 'Permisos par edutar Topologías',
                'created_at' => '2017-02-07 15:15:51',
                'updated_at' => '2017-02-07 15:15:55',
            ),
            20 => 
            array (
                'id' => 22,
                'name' => 'show-perms',
                'display_name' => 'Ver Permisos',
                'description' => 'Permisos para desplegar permisos',
                'created_at' => '2017-02-07 15:39:57',
                'updated_at' => '2017-02-07 15:39:58',
            ),
            21 => 
            array (
                'id' => 23,
                'name' => 'edit-roles',
                'display_name' => 'Edutar Roles',
                'description' => 'Permisos Para editar roles',
                'created_at' => '2017-02-07 15:51:38',
                'updated_at' => '2017-02-07 15:51:40',
            ),
            22 => 
            array (
                'id' => 24,
                'name' => 'create-histo',
                'display_name' => 'Crear Histografia',
                'description' => 'Permisos para crear Histografias',
                'created_at' => '2017-02-07 16:18:08',
                'updated_at' => '2017-02-07 16:18:09',
            ),
            23 => 
            array (
                'id' => 25,
                'name' => 'edit-histo',
                'display_name' => 'Editar Histografias',
                'description' => 'Permisos Para Histografias',
                'created_at' => '2017-02-07 16:18:41',
                'updated_at' => '2017-02-07 16:18:42',
            ),
            24 => 
            array (
                'id' => 26,
                'name' => 'edit-cito',
                'display_name' => 'Editar Citología',
                'description' => 'Permisos para Editar Citologias',
                'created_at' => '2017-02-07 16:20:09',
                'updated_at' => '2017-02-07 16:20:10',
            ),
            25 => 
            array (
                'id' => 27,
                'name' => 'show-histo',
                'display_name' => 'Ver Histopatologia',
                'description' => 'Permisos para ver Histopatologia',
                'created_at' => '2017-02-07 16:29:04',
                'updated_at' => '2017-02-07 16:29:05',
            ),
            26 => 
            array (
                'id' => 28,
                'name' => 'unbind-cito',
                'display_name' => 'Anular Citología',
                'description' => 'Permisos para anular Citología',
                'created_at' => '2017-03-06 02:19:55',
                'updated_at' => '2017-03-06 02:19:56',
            ),
            27 => 
            array (
                'id' => 29,
                'name' => 'config-serials',
                'display_name' => 'Configurar Numeros Seriales',
                'description' => 'Permisos para configurar numeraciones seriales',
                'created_at' => '2017-03-06 11:32:19',
                'updated_at' => '2017-03-06 11:32:19',
            ),
        ));
        
        
    }
}