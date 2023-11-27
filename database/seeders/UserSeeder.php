<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar y eliminar registros existentes con correos electrónicos específicos
        Empleado::where('cuit_emp', '1111111111')->forceDelete();
        Empleado::where('cuit_emp', '2222222222')->forceDelete();
        Empleado::where('cuit_emp', '3333333333')->forceDelete();
        Empleado::where('cuit_emp', '4444444444')->forceDelete();
        Empleado::where('cuit_emp', '5555555555')->forceDelete();

        User::where('email', 'admin@gmail.com')->forceDelete();
        User::where('email', 'gerente@gmail.com')->forceDelete();
        User::where('email', 'recepcionista@gmail.com')->forceDelete();
        User::where('email', 'cajero@gmail.com')->forceDelete();
        User::where('email', 'canchero@gmail.com')->forceDelete();
        User::where('email', 'invitado@gmail.com')->forceDelete();
        // Crear nuevos registros de usuarios
        $adm = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '11111111',
        ])->assignRole('admin');
        $admin = $adm->id;
        $fecha_hoy = Carbon::now();
        Empleado::create([
            'id_user' => $admin,
            'id_cargo' => '8',
            'cuit_emp' => '1111111111',
            'fecha_alta_emp' => $fecha_hoy,
        ]);

        $ger = User::create([
            'name' => 'gerente',
            'email' => 'gerente@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '22222222',
        ])->assignRole('gerente');
        $gerente = $ger->id;
        Empleado::create([
            'id_user' => $gerente,
            'id_cargo' => '8',
            'cuit_emp' => '2222222222',
            'fecha_alta_emp' => $fecha_hoy,
        ]);

        $rec = User::create([
            'name' => 'recepcionista',
            'email' => 'recepcionista@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '33333333',
        ])->assignRole('recepcionista');
        $recep = $rec->id;
        Empleado::create([
            'id_user' => $recep,
            'id_cargo' => '9',
            'cuit_emp' => '3333333333',
            'fecha_alta_emp' => $fecha_hoy,
        ]);

        $caj = User::create([
            'name' => 'cajero',
            'email' => 'cajero@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '44444444',
        ])->assignRole('cajero');
        $cajero = $caj->id;
        Empleado::create([
            'id_user' => $cajero,
            'id_cargo' => '7',
            'cuit_emp' => '4444444444',
            'fecha_alta_emp' => $fecha_hoy,
        ]);

        $canch = User::create([
            'name' => 'canchero',
            'email' => 'canchero@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '55555555',
        ])->assignRole('canchero');
        $canchero = $canch->id;
        Empleado::create([
            'id_user' => $canchero,
            'id_cargo' => '6',
            'cuit_emp' => '5555555555',
            'fecha_alta_emp' => $fecha_hoy,
        ]);

        User::create([
            'name' => 'invitado',
            'email' => 'invitado@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '66666666',
        ])->assignRole('invitado');
    }
} 
