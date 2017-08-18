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
     * @return void
     */

    /** @test */
    public function a_factura_entity_recibe_many_arrays_and_merge()
    {
        $data = [
            'num_factura' => '5068096',
            'num_cedula' => '0801197800719',
            'nombre_completo_cliente' => 'Ceny Osiris Oliva Mejia',
            'fecha_nacimiento' => '27/01/1978',
            'correo' => '',
            'direccion_entrega_sede' => 'Correo y Env.CITY',
            'medico' => 'Dr. Hector Will',
            'sexo' => 'F',
            'status' => 'Valida',
            'total_factura' => 1254.50,
            'examen' => array(
                ['codigo_examen' => 10327, 'nombre_examen' => 'Cit. Genital (B, Liq.) Tomada  En El Lab.'],
            )

        ];

        $data2 = [
            'num_factura' => '5068096',
            'num_cedula' => '0801197800719',
            'nombre_completo_cliente' => 'Ceny Osiris Oliva Mejia',
            'fecha_nacimiento' => '27/01/1978',
            'correo' => '',
            'direccion_entrega_sede' => 'Correo y Env.CITY',
            'medico' => 'Dr. Hector Will',
            'sexo' => 'F',
            'status' => 'Valida',
            'total_factura' => 1254.50,
            'examen' => array(
                ['codigo_examen' => 10327, 'nombre_examen' => 'Cit. Genital (B, Liq.) Tomada  En El Lab.'],
            )

        ];

        $response = $this->call('POST', '/api/facturas', $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('facturas', ['num_factura' => '5068096']);
        $this->assertDatabaseHas('examenes', ['num_factura' => '5068096']);
        $this->assertDatabaseHas('facturas', ['total_factura' => 1254.50]);
        $this->assertDatabaseHas('examenes', ['nombre_examen' => 'Cit. Genital (B, Liq.) Tomada  En El Lab.']);

        /**
         * A factura entity can't handle id's repetitions, throw error 500
         */
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
            'status' => 'Valida',
             'total_factura' => 1254.50,
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
            'status' => 'Invalida',
            'total_factura' => 1254.50,
        ];

        $response = $this->call('POST', '/api/facturas', $data);
        $this->assertDatabaseHas('facturas', ['status' => 'Valida']);
        $response->assertStatus(200);

        $response2 = $this->call('POST', '/api/facturas', $data2);
        $this->assertDatabaseHas('facturas', ['status' => 'Anulada']);
        $response2->assertStatus(200);
    }

    /**
     * @test
     */
    public function a_factura_translate_the_age_from_fecha_nacimineto_to_years()
    {
        $data = [
            'num_factura' => '5005963',
            'num_cedula' => '0801198813342',
            'nombre_completo_cliente' => 'Edith Marisol Alvarez Mena',
            'fecha_nacimiento' => '02/06/2016',
            'correo' => 'edith.m.mena@gmail.com',
            'direccion_entrega_sede' => 'HOSPITAL MILITAR',
            'medico' => 'Dr. Jorge Rodriguez',
            'sexo' => 'F',
            'status' => 'Valida',
            'total_factura' => 1254.50,
            'examen' => array(
                ['codigo_examen' => 11499, 'nombre_examen' => 'Marcador Tumoral en Biopsia Inmunoglobulina IgM'],
                ['codigo_examen' => 11498, 'nombre_examen' => 'Marcador Tumoral en Biopsia Inmunoglobulina IgG'],
                ['codigo_examen' => 11497, 'nombre_examen' => 'Marcador Tumoral en Biopsia Inmunoglobulina IgA']
            )
        ];

        $response = $this->call('POST', '/api/facturas', $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('facturas', ['edad' => '1 A']);
        $this->assertDatabaseHas('examenes', ['item' => 11499]);
    }

    /**
     * @test
     */
    public function a_factura_translate_the_age_from_fecha_nacimineto_to_months_if_the_time_is_less_than_a_year()
    {
        $data = [
            'num_factura' => '5005963',
            'num_cedula' => '0801198813342',
            'nombre_completo_cliente' => 'Edith Marisol Alvarez Mena',
            'fecha_nacimiento' => '02/06/2017',
            'correo' => 'edith.m.mena@gmail.com',
            'direccion_entrega_sede' => 'HOSPITAL MILITAR',
            'medico' => 'Dr. Jorge Rodriguez',
            'sexo' => 'F',
            'status' => 'Valida',
            'total_factura' => 1254.50,
            'examen' => array(
                ['codigo_examen' => 10260, 'nombre_examen' => 'Marcador Tumoral En Biopsia - Cd-30'],
                ['codigo_examen' => 10261, 'nombre_examen' => 'Marcador Tumoral Antigeno Epitelial De Membrana'],
                ['codigo_examen' => 10262, 'nombre_examen' => 'Marcador Tumoral En Biopsia']
            )
        ];

        $response = $this->call('POST', '/api/facturas', $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('facturas', ['edad' => '2 M']);
    }

}
