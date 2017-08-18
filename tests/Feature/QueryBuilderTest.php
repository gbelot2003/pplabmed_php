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
    {}
}
