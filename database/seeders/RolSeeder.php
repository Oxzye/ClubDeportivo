<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Elimina registros existentes de la tabla "model_has_permissions" para evitar restricciones de clave externa
        DB::table('model_has_permissions')->delete();

        // Elimina los registros existentes en las tablas "permissions" y "roles"
        Permission::query()->delete();
        Role::query()->delete();

        // Roles
        $rol_admin = Role::create(['name' => 'admin']);
        $rol_gerente = Role::create(['name' => 'gerente']);
        $rol_vendedor = Role::create(['name' => 'vendedor']);
        $rol_cliente = Role::create(['name' => 'cliente']);

        // Permisos para cada Rol
        Permission::create(['name' => 'lista_usuarios'])->assignRole($rol_admin);
        Permission::create(['name' => 'lista_productos'])->assignRole($rol_vendedor);
        Permission::create(['name' => 'lista_compras'])->assignRole($rol_cliente);
        //Permission::create(['name' => 'lista_pagos'])->syncRoles([$rol_vendedor, $rol_cliente]);
    }
}
