<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


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
        $adm_ger_caj_canch = [$rol_admin, $rol_gerente, $rol_cajero];
        //Roles y permisos según procesos/ alcances del proyecto

        //Admin lte vistas
        Permission::create(['name' => 'admin_vista'])->assignRole($rol_admin);
        Permission::create(['name' => 'gerente_vista'])->assignRole($rol_gerente);
        Permission::create(['name' => 'recepcionista_vista'])->assignRole($rol_recepcionista);
        Permission::create(['name' => 'cajero_vista'])->assignRole($rol_cajero);
        Permission::create(['name' => 'canchero_vista'])->assignRole($rol_canchero);

        //Apertura y Cierre de cajas

        Permission::create(['name' => 'abrir_caja'])->assignRole([$adm_ger_caj_canch]); //Create                                                               
        Permission::create(['name' => 'cerrar_caja'])->assignRole([$adm_ger_caj_canch]); //Edit
        Permission::create(['name' => 'borrar_caja'])->assignRole($rol_admin); //Eliminar
        Permission::create(['name' => 'listado_cajas'])->assignRole($rol_admin); //Ver Tabla cajas

        //solo la caja que el canchero o cajero abrió y puede cerrar en un turno en conclusion /si id_cajero === id_cajero en caja && caja === abierta
        Permission::create(['name' => 'caja_actual'])->assignRole([$adm_ger_caj_canch]);

        //Fin Apertura y Cierre de cajas


        //Inscripciones de socios y empleados

        //Permisos para la tabla "socios"
        Permission::create(['name' => 'crear_socio'])->assignRole([$rol_admin, $rol_cajero,]);
        Permission::create(['name' => 'listado_socios'])->assignRole($todos_menos_inv);
        Permission::create(['name' => 'editar_socio'])->assignRole([$rol_admin, $rol_cajero]);
        Permission::create(['name' => 'eliminar_socio'])->assignRole([$rol_admin, $rol_cajero]);

        // Permisos para la tabla "user"
        Permission::create(['name' => 'crear_user'])->assignRole([$rol_admin, $rol_cajero]);
        Permission::create(['name' => 'listado_user'])->assignRole($caj_admin_ger_recep);
        Permission::create(['name' => 'editar_user'])->assignRole([$rol_admin, $rol_cajero]);
        Permission::create(['name' => 'eliminar_user'])->assignRole([$rol_admin, $rol_cajero]);

        Permission::create(['name' => 'reset_password'])->assignRole($caj_admin_ger_recep);

        // Permisos para la tabla "empleados"
        Permission::create(['name' => 'crear_empleados'])->assignRole([$rol_admin, $rol_cajero]);
        Permission::create(['name' => 'listado_empleados'])->assignRole($todos_menos_inv);
        Permission::create(['name' => 'editar_empleados'])->assignRole([$rol_admin, $rol_cajero]);
        Permission::create(['name' => 'eliminar_empleados'])->assignRole([$rol_admin, $rol_cajero]);

        // Permisos para la tabla "dias"
        Permission::create(['name' => 'crear_dias'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'listado_dias'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'editar_dias'])->assignRole($rol_admin);
        Permission::create(['name' => 'eliminar_dias'])->assignRole($rol_admin);

        // Permisos para la tabla "países"
        Permission::create(['name' => 'crear_paises'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'listado_paises'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'editar_paises'])->assignRole($rol_admin);
        Permission::create(['name' => 'eliminar_paises'])->assignRole($rol_admin);

        // Permisos para la tabla "prov" (provincias)
        Permission::create(['name' => 'crear_prov'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'listado_prov'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'editar_prov'])->assignRole($rol_admin);
        Permission::create(['name' => 'eliminar_prov'])->assignRole($rol_admin);

        // Permisos para la tabla "localidades"
        Permission::create(['name' => 'crear_localidades'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'listado_localidades'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'editar_localidades'])->assignRole($rol_admin);
        Permission::create(['name' => 'eliminar_localidades'])->assignRole($rol_admin);

        // Permisos para la tabla "cargos"
        Permission::create(['name' => 'crear_cargos'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'listado_cargos'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'editar_cargos'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'eliminar_cargos'])->assignRole([$rol_admin, $rol_gerente]);


        // Permisos para la tabla "generos"
        Permission::create(['name' => 'crear_generos'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'listado_generos'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'editar_generos'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'eliminar_generos'])->assignRole([$rol_admin, $rol_gerente]);

        // Permisos para la tabla "cliente"
        Permission::create(['name' => 'crear_cliente'])->assignRole([$rol_admin, $rol_gerente, $rol_cajero, $rol_canchero]);
        Permission::create(['name' => 'listado_cliente'])->assignRole($todos_menos_inv);
        Permission::create(['name' => 'editar_cliente'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'eliminar_cliente'])->assignRole([$rol_admin, $rol_gerente]);

        //Permiso para la tabla listado_disponibilidades
        Permission::create(['name' => 'crear_disponibilidades'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'listado_disponibilidades'])->assignRole([$rol_admin, $rol_gerente, $rol_cajero, $rol_recepcionista]);
        Permission::create(['name' => 'editar_disponibilidades'])->assignRole([$rol_admin, $rol_gerente, $rol_recepcionista]);
        Permission::create(['name' => 'eliminar_disponibilidades'])->assignRole([$rol_admin, $rol_gerente]);
    //Fin Inscripciones de socios y empleados
       
       //Permiso para la tabla listado_diasxact
       Permission::create(['name' => 'crear_diasxact'])->assignRole([$rol_admin, $rol_gerente]);
       Permission::create(['name' => 'listado_diasxact'])->assignRole([$rol_admin, $rol_gerente, $rol_cajero, $rol_recepcionista, $rol_canchero]);
       Permission::create(['name' => 'editar_diasxact'])->assignRole([$rol_admin, $rol_gerente]);
       Permission::create(['name' => 'eliminar_diasxact'])->assignRole([$rol_admin, $rol_gerente]);  
       
       //Permiso para la tabla listado_sxa
       Permission::create(['name' => 'crear_sxa'])->assignRole([$rol_admin, $rol_gerente,$rol_recepcionista, $rol_cajero]);
       Permission::create(['name' => 'listado_sxa'])->assignRole([$rol_admin, $rol_gerente, $rol_recepcionista,$rol_cajero,$rol_canchero]);
       Permission::create(['name' => 'editar_sxa'])->assignRole([$rol_admin, $rol_gerente, $rol_cajero, $rol_recepcionista]);
       Permission::create(['name' => 'eliminar_sxa'])->assignRole([$rol_admin, $rol_gerente, $rol_cajero]);   
       
        //Permiso para la tabla listado_exa
        Permission::create(['name' => 'crear_exa'])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'listado_exa'])->assignRole([$rol_admin, $rol_gerente, $rol_recepcionista,$rol_cajero,$rol_canchero]);
        Permission::create(['name' =>'editar_exa' ])->assignRole([$rol_admin, $rol_gerente]);
        Permission::create(['name' => 'eliminar_exa'])->assignRole([$rol_admin, $rol_gerente]);   

        //Permiso para la tabla listado_actividades
        Permission::create(['name' => 'crear_act'])->assignRole([$rol_admin, $rol_gerente, $rol_cajero]);
        Permission::create(['name' => 'listado_act'])->assignRole([$rol_admin, $rol_gerente, $rol_recepcionista,$rol_cajero,$rol_canchero]);
        Permission::create(['name' =>'editar_act' ])->assignRole([$rol_admin, $rol_gerente, $rol_cajero]);
        Permission::create(['name' => 'eliminar_act'])->assignRole([$rol_admin, $rol_gerente, $rol_cajero]);   
        
    //     //Permiso para la tabla listado_detallefactura
    //     Permission::create(['name' => 'crear_detallefactura'])->assignRole([$rol_admin, $rol_gerente,$rol_recepcionista]);
    //     Permission::create(['name' => 'listado_detallefactura'])->assignRole([$rol_admin, $rol_gerente, $rol_recepcionista,$rol_cajero,$rol_canchero]);
    //     Permission::create(['name' =>'editar_detallefactura' ])->assignRole([$rol_admin, $rol_gerente, $rol_cajero, $rol_recepcionista]);
    //     Permission::create(['name' => 'eliminar_detallefactura'])->assignRole([$rol_admin, $rol_gerente]);         
    }
}  

