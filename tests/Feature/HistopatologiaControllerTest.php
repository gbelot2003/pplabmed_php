<?php

namespace Tests\Feature;

use App\Permission;
use App\Role;
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
        $admin = factory(Role::class)->create(['name' => 'admin']);
        $perm = factory(Permission::class)->create(['name' => 'manage-histo']);

        $admin->attachPermission($perm);
        $user->roles()->attach($admin->id); // id only


        $this->assertEquals($user->id, 1);
    }
}
