<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Forma de Attach de agregar roles
        $role = Role::create(['name' => 'Admin']);
        $role->permissions()->attach([1, 2, 3, 4, 5, 6, 7 ,8 ,9, 10 ,11]);
        //Forma SyncPermissions que manda los nombres en lugar de los ID
        $role = Role::create(['name' => 'Instructor']);

        $role->syncPermissions('Crear Cursos','Ver Cursos', 'Editar Cursos', 'Eliminar Cursos',);
    }
}
