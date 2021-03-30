<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create([
            'name' => 'Crear Cursos',
        ]);
                Permission::create([
            'name' => 'Ver Cursos',
        ]);
                Permission::create([
            'name' => 'Editar Cursos',
        ]);
                Permission::create([
            'name' => 'Eliminar Cursos',
        ]);
        Permission::create([
            'name' => 'Ver Dashboard',
        ]);
        Permission::create([
            'name' => 'Crear Roles',
        ]);
        Permission::create([
            'name' => 'Ver Roles',
        ]);
        Permission::create([
            'name' => 'Editar Roles',
        ]);
        Permission::create([
            'name' => 'Eliminar Roles',
        ]);
        Permission::create([
            'name' => 'Ver Usuarios',
        ]);
        Permission::create([
            'name' => 'Editar Usuarios',
        ]);

    }
}
