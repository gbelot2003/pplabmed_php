<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HistopatologiaControllerTest extends TestCase
{

    use WithoutMiddleware, DatabaseMigrations, DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function formulario_de_filtro_de_busqueda_existe()
    {
        $user = factory(User::class)->create();

        $role = Role::findOrFail(1);
        $role->perms()->sync($request->input('perms_lists'));

        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('/histopatologia')
            ->see('Registros de Histopatologia');
    }
}
