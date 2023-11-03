<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar y eliminar registros existentes con correos electrónicos específicos
        User::truncate();

         // Crear nuevos registros de usuarios
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '11111111',
        ])->assignRole('admin');

        User::create([
            'name' => 'gerente',
            'email' => 'gerente@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '22222222',
        ])->assignRole('gerente');

        User::create([
            'name' => 'recepcionista',
            'email' => 'recepcionista@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '33333333',
        ])->assignRole('recepcionista');

        User::create([
            'name' => 'cajero',
            'email' => 'cajero@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '44444444',
        ])->assignRole('cajero');

        User::create([
            'name' => 'canchero',
            'email' => 'canchero@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '55555555',
        ])->assignRole('canchero');

        User::create([
            'name' => 'invitado',
            'email' => 'invitado@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '66666666',
        ])->assignRole('invitado');
    }
}
