<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(FirmasTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(GravidadsTableSeeder::class);
        $this->call(TopologiasTableSeeder::class);
        $this->call(MorfologiasTableSeeder::class);
    }
}
