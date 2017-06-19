<?php

namespace Tests\Feature;

use App\Factura;
use Atlas\Reports\QueryBuilder;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QueryBuilderTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function Query_Builder_return_model_and_reques()
    {

        $requery = [
            'inicio' => '09/06/2017',
            'final' => '10/06/2017',
            'icitologia_id' => 1,
            'mor1' => 2
        ];

        $data = new Request($requery);

        factory(\App\Factura::class, 2)->create();

        $model = Factura::findOrFail(1);

        $query = new QueryBuilder();
        $query->processRequirements($model, $data);
        list($bdate, $edate, $idCito, $direc, $mor1, $mor2, $topog) = $query->buildQueryRequires();

        $this->assertEquals(1, $idCito);
        $this->assertEquals(null, $direc);
        $this->assertEquals(2, $mor1);
    }
}
