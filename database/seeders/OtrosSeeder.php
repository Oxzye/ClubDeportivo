<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Instalacion;
use App\Models\Deporte;
use App\Models\Dias;
use App\Models\Cargos;
use App\Models\generos;
use App\Models\Tipo_factura;
use App\Models\Formas_pago;
use App\Models\tipodetfactura;
use Illuminate\Support\Facades\DB;

class OtrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //Limpiar tablas
        Instalacion::truncate();
        Deporte::truncate();
        Dias::truncate();
        Cargos::truncate();
        generos::truncate();
        Tipo_factura::truncate();
        Formas_pago::truncate();
        tipodetfactura::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        //Creacion de datos

        Instalacion::create([
            'nombre_inst' => 'Estadio F11',
            'tipo_inst' => 'Césped Natural, Tribunas, Baños, Kiosco',
            'capacidad_inst' => 24300,
        ]);
        Instalacion::create([
            'nombre_inst' => 'Cancha F5 Nro1',
            'tipo_inst' => 'Césped sintético, Baños, Kiosco',
            'capacidad_inst' => 12,
        ]);
        Instalacion::create([
            'nombre_inst' => 'Cancha F5 Nro2',
            'tipo_inst' => 'Césped sintético, Baños, Kiosco',
            'capacidad_inst' => 12,
        ]);
        Instalacion::create([
            'nombre_inst' => 'Cancha F5 Nro3',
            'tipo_inst' => 'Césped sintético, Baños, Kiosco',
            'capacidad_inst' => 12,
        ]);
        Instalacion::create([
            'nombre_inst' => 'Piscina Olímpica',
            'tipo_inst' => 'Piscina 50x25x2.7mts, Baños',
            'capacidad_inst' => 60,
        ]);
        Instalacion::create([
            'nombre_inst' => 'Cancha de Basquet',
            'tipo_inst' => 'Piso de Parquet',
            'capacidad_inst' => 20,
        ]);
        Instalacion::create([
            'nombre_inst' => 'Cancha Volley',
            'tipo_inst' => 'Piso concreto',
            'capacidad_inst' => 25,
        ]);
        Instalacion::create([
            'nombre_inst' => 'Cancha Tennis',
            'tipo_inst' => 'Piso Clay court',
            'capacidad_inst' => 5,
        ]);

        Deporte::create([
            'nombreDep' => 'Futbol',
            'M_F_Mixto' => 'Masculino',
            'descripcionDep' => '11 contra 11',
        ]);
        Deporte::create([
            'nombreDep' => 'Basquet',
            'M_F_Mixto' => 'Masculino',
            'descripcionDep' => '5 contra 5',
        ]);
        Deporte::create([
            'nombreDep' => 'Volley',
            'M_F_Mixto' => 'Masculino',
            'descripcionDep' => '5 contra 5',
        ]);
        Deporte::create([
            'nombreDep' => 'Natación',
            'M_F_Mixto' => 'Masculino',
            'descripcionDep' => 'acuático',
        ]);
        Deporte::create([
            'nombreDep' => 'Tennis',
            'M_F_Mixto' => 'Masculino',
            'descripcionDep' => '1 contra 1 o 2 contra 2',
        ]);

        Dias::create([
            'nombre_dia' => 'Lunes',
        ]);
        Dias::create([
            'nombre_dia' => 'Martes',
        ]);
        Dias::create([
            'nombre_dia' => 'Miércoles',
        ]);
        Dias::create([
            'nombre_dia' => 'Jueves',
        ]);
        Dias::create([
            'nombre_dia' => 'Viernes',
        ]);
        Dias::create([
            'nombre_dia' => 'Sábado',
        ]);
        Dias::create([
            'nombre_dia' => 'Domingo',
        ]);

        Cargos::create([
            'nombre_cargo' => 'Profesor de Futbol',
            'descripcionCargo' => 'Enseña futbol',
            'salario_base' => 110000,
            'horas_de_trabajoxmes' => 48,
            'horario_de_trabajo' => '09:00 a 11:00, 16:00 a 18:00',
        ]);
        Cargos::create([
            'nombre_cargo' => 'Profesor de Basquet',
            'descripcionCargo' => 'Enseña Basquet',
            'salario_base' => 155000,
            'horas_de_trabajoxmes' => 48,
            'horario_de_trabajo' => '09:00 a 11:00, 16:00 a 18:00',
        ]);
        Cargos::create([
            'nombre_cargo' => 'Profesor de Natación',
            'descripcionCargo' => 'Enseña Natación',
            'salario_base' => 123000,
            'horas_de_trabajoxmes' => 48,
            'horario_de_trabajo' => '09:00 a 11:00, 16:00 a 18:00',
        ]);
        Cargos::create([
            'nombre_cargo' => 'Profesor de Tennis',
            'descripcionCargo' => 'Enseña Tennis',
            'salario_base' => 122000,
            'horas_de_trabajoxmes' => 48,
            'horario_de_trabajo' => '09:00 a 11:00, 16:00 a 18:00',
        ]);
        Cargos::create([
            'nombre_cargo' => 'Profesor de Volley',
            'descripcionCargo' => 'Enseña Volley',
            'salario_base' => 105500,
            'horas_de_trabajoxmes' => 48,
            'horario_de_trabajo' => '09:00 a 11:00, 16:00 a 18:00',
        ]);
        Cargos::create([
            'nombre_cargo' => 'Canchero',
            'descripcionCargo' => 'Alquila y controla canchas F5',
            'salario_base' => 100000,
            'horas_de_trabajoxmes' => 160,
            'horario_de_trabajo' => '08:00 a 16:00 o 16:00 a 00:00',
        ]);
        Cargos::create([
            'nombre_cargo' => 'Cajero',
            'descripcionCargo' => 'Caja',
            'salario_base' => 150000,
            'horas_de_trabajoxmes' => 140,
            'horario_de_trabajo' => '08:00 a 14:00, 14:00 a 21:00',
        ]);
        Cargos::create([
            'nombre_cargo' => 'Gerente',
            'descripcionCargo' => 'Encargado de todo el personal',
            'salario_base' => 500000,
            'horas_de_trabajoxmes' => 160,
            'horario_de_trabajo' => '24/7',
        ]);
        Cargos::create([
            'nombre_cargo' => 'Recepcionista',
            'descripcionCargo' => 'Controla a la gente que ingresa al club, resuelve dudas',
            'salario_base' => 150000,
            'horas_de_trabajoxmes' => 140,
            'horario_de_trabajo' => '07:00 a 14:00 o 14:00 a 21:00',
        ]);

        generos::create([
            'tipo_genero' => 'Masculino',
            'abreviatura_genero' => 'M',
        ]);
        generos::create([
            'tipo_genero' => 'Femenino',
            'abreviatura_genero' => 'F',
        ]);
        generos::create([
            'tipo_genero' => 'Otro',
            'abreviatura_genero' => 'x',
        ]);

        Tipo_factura::create([
            'tipo_fac' => 'A'
        ]);
        Tipo_factura::create([
            'tipo_fac' => 'B'
        ]);
        Tipo_factura::create([
            'tipo_fac' => 'C'
        ]);
        Tipo_factura::create([
            'tipo_fac' => 'E'
        ]);

        Formas_pago::create([
            'forma_pago_fdp' => 'Efectivo',
            'descripcion_fdp' => 'plataplataplata',
        ]);
        Formas_pago::create([
            'forma_pago_fdp' => 'Mercado pago',
            'descripcion_fdp' => 'pago electrónico',
        ]);
        Formas_pago::create([
            'forma_pago_fdp' => 'Tarjeta Débito',
            'descripcion_fdp' => 'pago electrónico',
        ]);
        Formas_pago::create([
            'forma_pago_fdp' => 'Tarjeta Crédito',
            'descripcion_fdp' => 'pago electrónico',
        ]);

        tipodetfactura::create([
            'tipodetalle' => 'Cuota Social',
            'descripcion_tdf' => 'Cuota social',
        ]);

        tipodetfactura::create([
            'tipodetalle' => 'Cuota Social',
            'descripcion_tdf' => 'Cuota social',
        ]);

        tipodetfactura::create([
            'tipodetalle' => 'Actividad Particular',
            'descripcion_tdf' => 'Inscripción a alguna actividad dentro del club',
        ]);

        tipodetfactura::create([
            'tipodetalle' => 'Venta de indumentaria',
            'descripcion_tdf' => 'Venta de indumentaria del club',
        ]);

        tipodetfactura::create([
            'tipodetalle' => 'Alquiler de Predio o Instalaciones',
            'descripcion_tdf' => 'Alquiler a cliente',
        ]);

    }
}
