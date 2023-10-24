<?php

use App\Models\Instalacion;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SociosController;
use App\Http\Controllers\InstalacionesController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\PaisesController;
use App\Http\Controllers\GenerosController;
use App\Http\Controllers\TipoFacturaController;
use App\Http\Controllers\tipodetfacturaController;
use App\Http\Controllers\Formas_pagoController;
use App\Http\Controllers\DeportesController;
use App\Http\Controllers\DiasController;


Route::get('/', function(){
        return view('panel.index');
});

Route::resource('/socios', SociosController::class)->names('socios');

Route::resource('/instalaciones', InstalacionesController::class)->names('instalaciones');

Route::resource('/cargos', CargosController::class)->names('cargos');

Route::resource('/paises', PaisesController::class)->names('paises');

Route::resource('/genereos', GenerosController::class)->names('generos');

Route::resource('/Tipo_factura', TipoFacturaController::class)->names('Tipo_factura');

Route::resource('/tipodetfactura', tipodetfacturaController::class)->names('tipos_detalle_factura');

Route::resource('/Formas_pago', Formas_pagoController::class)->names('Formas_pago');

Route::resource('/dias', DiasController::class)->names('dias');

Route::resource('/deportes', DeportesController::class)->names('deportes');