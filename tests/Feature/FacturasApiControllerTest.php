<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FacturasApiControllerTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function a_factura_entity_recive_many_arrays_and_merge()
    {
        $data = [
            'num_factura' => '5005963',
            'num_cedula' => '0801198813342',
            'nombre_completo_cliente' => 'Edith Marisol Alvarez Mena',
            'fecha_nacimiento' => '',
            'correo' => 'edith.m.mena@gmail.com',
            'direccion_entrega_sede' => 'HOSPITAL MILITAR',
            'medico' => 'Dr. Jorge Rodriguez',
            'sexo' => 'F',
            'status' => 'Valida'
            /*'examen' => array(
                ['codigo_examen' => 10260, 'nombre_examen' => 'Marcador Tumoral En Biopsia - Cd-30'],
                ['codigo_examen' => 10261, 'nombre_examen' => 'Marcador Tumoral Antigeno Epitelial De Membrana'],
                ['codigo_examen' => 10262, 'nombre_examen' => 'Marcador Tumoral En Biopsia']
            )*/

        ];

        $data2 = [
            'num_factura' => '5005963',
            'num_cedula' => '0801198813342',
            'nombre_completo_cliente' => 'Edith Marisol Alvarez Mena',
            'fecha_nacimiento' => '',
            'correo' => 'edith.m.mena@gmail.com',
            'direccion_entrega_sede' => 'HOSPITAL MILITAR',
            'medico' => 'Dr. Jorge Rodriguez',
            'sexo' => 'F',
            'status' => 'Valida'
            /*'examen' => array(
                ['codigo_examen' => 10260, 'nombre_examen' => 'Marcador Tumoral En Biopsia - Cd-30'],
                ['codigo_examen' => 10261, 'nombre_examen' => 'Marcador Tumoral Antigeno Epitelial De Membrana'],
                ['codigo_examen' => 10262, 'nombre_examen' => 'Marcador Tumoral En Biopsia']
            )*/

        ];

        $response = $this->call('POST', '/api/facturas', $data);
        $response->assertStatus(200);

        $response2 = $this->call('POST', '/api/facturas', $data2);
        $response2->assertStatus(500);
    }

    /**
     * @test
     */
    public function a_factura_reedit_a_invalidated_register()
    {
        $data = [
            'num_factura' => '5005963',
            'num_cedula' => '0801198813342',
            'nombre_completo_cliente' => 'Edith Marisol Alvarez Mena',
            'fecha_nacimiento' => '',
            'correo' => 'edith.m.mena@gmail.com',
            'direccion_entrega_sede' => 'HOSPITAL MILITAR',
            'medico' => 'Dr. Jorge Rodriguez',
            'sexo' => 'F',
            'status' => 'Valida'
        ];

        $data2 = [
            'num_factura' => '5005963',
            'num_cedula' => '0801198813342',
            'nombre_completo_cliente' => 'Edith Marisol Alvarez Mena',
            'fecha_nacimiento' => '',
            'correo' => 'edith.m.mena@gmail.com',
            'direccion_entrega_sede' => 'HOSPITAL MILITAR',
            'medico' => 'Dr. Jorge Rodriguez',
            'sexo' => 'F',
            'status' => 'Invalida'
        ];

        $response = $this->call('POST', '/api/facturas', $data);
        $response->assertStatus(200);

        $response2 = $this->call('POST', '/api/facturas', $data2);
        $response2->assertStatus(200);
    }
}
