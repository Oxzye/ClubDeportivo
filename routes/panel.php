<?php

use App\Http\Controllers\CajasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SociosController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\InstalacionesController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\PaisesController;
use App\Http\Controllers\GenerosController;
use App\Http\Controllers\TipoFacturaController;
use App\Http\Controllers\TipodetfacturaController;
use App\Http\Controllers\Formas_pagoController;
use App\Http\Controllers\DeportesController;
use App\Http\Controllers\DiasController;
use App\Http\Controllers\ProvinciasController;
use App\Http\Controllers\LocalidadesController;
use App\Http\Controllers\DisponibilidadesController;


Route::get('/', function(){
        return view('panel.index');
});

Route::get('/socios/dadosdebaja', [SociosController::class, 'dadosdebaja'])->name('socios.dadosdebaja');
Route::get('/socios/restore/{id}', [SociosController::class, 'restore'])->name('socios.restore');
Route::get('/socios/resetPassword', [SociosController::class, 'resetPassword'])->name('socios.resetPassword');
Route::resource('/socios', SociosController::class)->names('socios');

Route::get('/empleados/dadosdebaja', [EmpleadosController::class, 'dadosdebaja'])->name('empleados.dadosdebaja');
Route::get('/empleados/restore/{id}', [EmpleadosController::class, 'restore'])->name('empleados.restore');
Route::resource('/empleados', EmpleadosController::class)->names('empleados');


Route::resource('/instalaciones', InstalacionesController::class)->names('instalaciones');

Route::resource('/cargos', CargosController::class)->names('cargos');

Route::resource('/paises', PaisesController::class)->names('paises');

Route::resource('/generos', GenerosController::class)->names('generos');

Route::resource('/Tipo_factura', TipoFacturaController::class)->names('Tipo_factura');

Route::resource('/tipodetfactura', tipodetfacturaController::class)->names('tipos_detalle_factura');

Route::resource('/Formas_pago', Formas_pagoController::class)->names('Formas_pago');

Route::resource('/dias', DiasController::class)->names('dias');

Route::resource('/deportes', DeportesController::class)->names('deportes');

Route::resource('/Provincias', ProvinciasController::class)->names('Provincias');

Route::resource('/Localidades', LocalidadesController::class)->names('Localidades');

Route::resource('/Cajas', CajasController::class)->names('Cajas');
//Route::get('/Cajas/cierre/{id}', 'CajasController@cierre')->name('Cajas.cierre');

//Route::post('/Cajas/apertura', CajasController::class, 'apertura')->name('Cajas.apertura');

Route::resource('/Disponibilidades', DisponibilidadesController::class)->names('Disponibilidades');
