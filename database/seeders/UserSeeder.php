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
        User::where('email', 'admin@gmail.com')->delete();
        User::where('email', 'vendedor@gmail.com')->delete();
        User::where('email', 'cliente@gmail.com')->delete();

         // Crear nuevos registros de usuarios
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '12345678',
        ])->assignRole('admin');

        User::create([
            'name' => 'vendedor',
            'email' => 'vendedor@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '12345679'
        ])->assignRole('vendedor');

        User::create([
            'name' => 'cliente',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make('12345'),
            'dni' => '12345689'

        ])->assignRole('cliente');
    }
}
