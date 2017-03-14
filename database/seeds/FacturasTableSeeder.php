<?php

use Illuminate\Database\Seeder;

class FacturasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('facturas')->delete();
        
        \DB::table('facturas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'num_factura' => 113,
                'num_cedula' => '344595520',
                'nombre_completo_cliente' => 'Nedra Wuckert',
                'fecha_nacimiento' => '2000-08-09 00:00:00',
                'edad' => '16 A',
                'correo' => 'rice.julianne@yahoo.com',
                'correo2' => NULL,
                'direccion_entrega_sede' => 'Natus laboriosam mollitia laboriosam sequi.',
                'medico' => 'Matteo Klocko',
                'status' => 'Valida',
                'sexo' => 'F',
                'created_at' => '2017-02-10 00:59:51',
                'updated_at' => '2017-03-14 15:40:49',
            ),
            1 => 
            array (
                'id' => 2,
                'num_factura' => 196,
                'num_cedula' => '20682',
                'nombre_completo_cliente' => 'Junior Luettgen Sr.',
                'fecha_nacimiento' => '1976-01-23 00:00:00',
                'edad' => '41 A',
                'correo' => 'maddison79@gmail.com',
                'correo2' => NULL,
                'direccion_entrega_sede' => 'Recusandae sunt eos similique numquam soluta.',
                'medico' => 'Lucy Reinger',
                'status' => 'Valida',
                'sexo' => 'M',
                'created_at' => '2017-02-10 00:59:51',
                'updated_at' => '2017-03-14 15:40:37',
            ),
            2 => 
            array (
                'id' => 3,
                'num_factura' => 132,
                'num_cedula' => '36338283',
                'nombre_completo_cliente' => 'Miss Alena Powlowski DVM',
                'fecha_nacimiento' => '1981-11-22 00:00:00',
                'edad' => '35 A',
                'correo' => 'rosenbaum.franco@yahoo.com',
                'correo2' => NULL,
                'direccion_entrega_sede' => 'Nobis ratione voluptatum consequuntur voluptas et atque quaerat cumque.',
                'medico' => 'Mr. Reilly Olson DDS',
                'status' => 'Valida',
                'sexo' => 'F',
                'created_at' => '2017-02-10 00:59:51',
                'updated_at' => '2017-03-14 15:41:07',
            ),
            3 => 
            array (
                'id' => 4,
                'num_factura' => 177,
                'num_cedula' => '61583',
                'nombre_completo_cliente' => 'Sylvia Kertzmann',
                'fecha_nacimiento' => '2016-11-16 00:00:00',
                'edad' => '3 M',
                'correo' => 'lonny.aufderhar@gmail.com',
                'correo2' => NULL,
                'direccion_entrega_sede' => 'Dolor aut sit minima temporibus voluptates.',
                'medico' => 'Zena Waters PhD',
                'status' => 'Valida',
                'sexo' => 'F',
                'created_at' => '2017-02-10 00:59:51',
                'updated_at' => '2017-03-14 15:40:58',
            ),
            4 => 
            array (
                'id' => 5,
                'num_factura' => 199,
                'num_cedula' => '3117148',
                'nombre_completo_cliente' => 'Prof. Donnie Lowe',
                'fecha_nacimiento' => '2001-01-14 00:00:00',
                'edad' => NULL,
                'correo' => 'bbradtke@gmail.com',
                'correo2' => NULL,
                'direccion_entrega_sede' => 'Nesciunt repellendus atque nesciunt autem recusandae aperiam dolorum.',
                'medico' => 'Daryl Franecki',
                'status' => 'Valida',
                'sexo' => 'M',
                'created_at' => '2017-02-10 00:59:51',
                'updated_at' => '2017-02-10 00:59:51',
            ),
            5 => 
            array (
                'id' => 7,
                'num_factura' => 156,
                'num_cedula' => '6',
                'nombre_completo_cliente' => 'Twila Sawayn',
                'fecha_nacimiento' => '1974-09-10 00:00:00',
                'edad' => '42 A',
                'correo' => 'cmonahan@yahoo.com',
                'correo2' => NULL,
                'direccion_entrega_sede' => 'Sit adipisci ut et a alias qui ut magnam.',
                'medico' => 'Prof. Makenzie Robel',
                'status' => 'Valida',
                'sexo' => 'M',
                'created_at' => '2017-02-10 00:59:51',
                'updated_at' => '2017-03-14 15:41:26',
            ),
            6 => 
            array (
                'id' => 8,
                'num_factura' => 159,
                'num_cedula' => '80358873',
                'nombre_completo_cliente' => 'Ms. Leanne Wyman I',
                'fecha_nacimiento' => '1982-11-19 00:00:00',
                'edad' => '34 A',
                'correo' => 'gulgowski.hermann@gmail.com',
                'correo2' => NULL,
                'direccion_entrega_sede' => 'Excepturi consequatur quas omnis quod aliquid.',
                'medico' => 'Mr. Benton Pfannerstill I',
                'status' => 'Valida',
                'sexo' => 'F',
                'created_at' => '2017-02-10 00:59:51',
                'updated_at' => '2017-03-14 15:41:36',
            ),
            7 => 
            array (
                'id' => 9,
                'num_factura' => 151,
                'num_cedula' => '6134',
                'nombre_completo_cliente' => 'Zelma O\'Conner',
                'fecha_nacimiento' => '1985-07-21 00:00:00',
                'edad' => '31 A',
                'correo' => 'mohammed76@yahoo.com',
                'correo2' => NULL,
                'direccion_entrega_sede' => 'Labore adipisci et quo possimus dolor eum.',
                'medico' => 'Samir Von Jr.',
                'status' => 'Valida',
                'sexo' => 'F',
                'created_at' => '2017-02-10 00:59:51',
                'updated_at' => '2017-03-14 15:41:17',
            ),
            8 => 
            array (
                'id' => 10,
                'num_factura' => 110,
                'num_cedula' => '97743755',
                'nombre_completo_cliente' => 'Felicia Zemlak',
                'fecha_nacimiento' => '2014-03-09 00:00:00',
                'edad' => NULL,
                'correo' => 'gdaniel@yahoo.com',
                'correo2' => NULL,
                'direccion_entrega_sede' => 'Maiores qui nihil expedita nesciunt similique.',
                'medico' => 'Etha Murazik IV',
                'status' => 'Valida',
                'sexo' => 'F',
                'created_at' => '2017-02-10 00:59:51',
                'updated_at' => '2017-02-10 00:59:51',
            ),
        ));
        
        
    }
}