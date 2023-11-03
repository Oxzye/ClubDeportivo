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
        $rol_recepcionista = Role::create(['name' => 'recepcionista']);
        $rol_cajero = Role::create(['name' => 'cajero']);
        $rol_canchero = Role::create(['name' => 'canchero']);
        $rol_invitado = Role::create(['name' => 'invitado']);

    
        $todos_menos_inv = [$rol_admin, $rol_gerente, $rol_recepcionista, $rol_cajero, $rol_canchero];
        $caj_admin_ger_recep = [$rol_admin, $rol_gerente, $rol_recepcionista, $rol_cajero];

    //Roles y permisos según procesos/ alcances del proyecto

    //Apertura y Cierre de cajas

        Permission::create(['name' => 'abrir_caja'])->syncRole($todos_menos_inv); //Create                                                               
        Permission::create(['name' => 'cerrar_caja'])->syncRole($todos_menos_inv); //Edit
        Permission::create(['name' => 'borrar_caja'])->assignRole($rol_admin); //Eliminar
        Permission::create(['name' => 'listado_cajas'])->assignRole($rol_admin); //Ver Tabla cajas

        //solo la caja que el canchero o cajero abrió y puede cerrar en un turno en conclusion /si id_cajero === id_cajero en caja && caja === abierta
        Permission::create(['name' => 'caja_actual'])->syncRole([$todos_menos_inv]);

    //Fin Apertura y Cierre de cajas


    //Inscripciones de socios y empleados

        //Permisos para la tabla "socios"
        Permission::create(['name' => 'crear_socio'])->syncRole([$rol_admin, $rol_cajero,]);                                                      
        Permission::create(['name' => 'listado_socios'])->syncRole($todos_menos_inv);
        Permission::create(['name' => 'editar_socio'])->syncRole([$rol_admin, $rol_cajero]);
        Permission::create(['name' => 'eliminar_socio'])->syncRole([$rol_admin, $rol_cajero]);
        
        // Permisos para la tabla "user"
        Permission::create(['name' => 'crear_user'])->syncRole([$rol_admin, $rol_cajero]);
        Permission::create(['name' => 'listado_user'])->syncRole($caj_admin_ger_recep);
        Permission::create(['name' => 'editar_user'])->syncRole([$rol_admin, $rol_cajero]);
        Permission::create(['name' => 'eliminar_user'])->syncRole([$rol_admin, $rol_cajero]);
        
        Permission::create(['name' => 'reset_password'])->syncRole($caj_admin_ger_recep);
        
        // Permisos para la tabla "empleados"
        Permission::create(['name' => 'crear_empleados'])->syncRole([$rol_admin, $rol_cajero]);
        Permission::create(['name' => 'listado_empleados'])->syncRole($todos_menos_inv);
        Permission::create(['name' => 'editar_empleados'])->syncRole([$rol_admin, $rol_cajero]);
        Permission::create(['name' => 'eliminar_empleados'])->syncRole([$rol_admin, $rol_cajero]);

        // Permisos para la tabla "países"
        Permission::create(['name' => 'crear_paises'])->syncRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'listado_paises'])->syncRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'editar_paises'])->assignRole($rol_admin);
        Permission::create(['name' => 'eliminar_paises'])->assignRole($rol_admin);

        // Permisos para la tabla "prov" (provincias)
        Permission::create(['name' => 'crear_prov'])->syncRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'listado_prov'])->syncRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'editar_prov'])->assignRole($rol_admin);
        Permission::create(['name' => 'eliminar_prov'])->assignRole($rol_admin);

        // Permisos para la tabla "localidades"
        Permission::create(['name' => 'crear_localidades'])->syncRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'listado_localidades'])->syncRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'editar_localidades'])->assignRole($rol_admin);
        Permission::create(['name' => 'eliminar_localidades'])->assignRole($rol_admin);

        // Permisos para la tabla "cargos"
        Permission::create(['name' => 'crear_cargos'])->syncRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'listado_cargos'])->synRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'editar_cargos'])->syncRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'eliminar_cargos'])->syncRole([$rol_admin, $rol_gerente]);


        // Permisos para la tabla "generos"
        Permission::create(['name' => 'crear_generos'])->syncRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'listado_generos'])->syncRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'editar_generos'])->syncRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'eliminar_generos'])->syncRole([$rol_admin, $rol_gerente]);

        // Permisos para la tabla "cliente"
        Permission::create(['name' => 'crear_cliente'])->syncRole([$rol_admin, $rol_gerente, $rol_cajero, $rol_canchero]);
        Permission::create(['name' => 'listado_cliente'])->syncRole($todos_menos_inv);
        Permission::create(['name' => 'editar_cliente'])->syncRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'eliminar_cliente'])->syncRole([$rol_admin, $rol_gerente]);

    //Fin Inscripciones de socios y empleados
                                    

        

    }
}
