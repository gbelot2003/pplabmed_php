<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FacturasApiControllerTest extends TestCase
{

    //use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function a_factura_entity_recive_many_arrays_and_merge()
    {
        $data = [
            'id' => 55,
            'name' => 'Whatever',
            'examenes' => array(
                'codigo_examen' => array(
                    55, 56
                ),
                'nombre_examen' => array(
                    'nombre1', 'nombre2'
                )
            )
        ];

        $response = $this->call('POST', '/api/facturas', $data);
        $response
            ->assertStatus(200);


    }
}
