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
            'num_factura' => '5005932',
            'num_cedula' => '0311198100309',
            'nombre_completo_cliente' => 'Juan Jorge Mourra Carias',
            'fecha_nacimiento' => '05/11/1972',
            'correo' => 'jmourra@bcie.org',
            'direccion_entrega_sede' => 'Correo y Env.RD',
            'medico' => 'Dra. Claudia Mejia',
            'sexo' => 'M',
            'examen' => array(
                ['codigo_examen' => 10260, 'nombre_examen' => 'Marcador Tumoral En Biopsia - Cd-30'],
                ['codigo_examen' => 10261, 'nombre_examen' => 'Marcador Tumoral Antigeno Epitelial De Membrana'],
                ['codigo_examen' => 10262, 'nombre_examen' => 'Marcador Tumoral En Biopsia']
            )

        ];

        $response = $this->call('POST', '/api/facturas', $data);
        $response
            ->assertStatus(200);
    }
}
