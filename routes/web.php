<?php

use App\Http\Controllers\DeportesController;
use App\Http\Controllers\Formas_pagoController;
use App\Http\Controllers\PaisesController;
use App\Http\Controllers\DiasController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\TipoFacturaController;
use App\Http\Controllers\InstalacionesController;
use App\Http\Controllers\tipodetfacturaController;
use App\Http\Controllers\GenerosController;
use App\Http\Controllers\ProvinciasController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Rutas de Tipo de detalle de facturas
/*
Route::get('/Tipodetfactura', [tipodetfacturaController::class, 'index'])->name('tipos_detalle_factura.index');
Route::post('/Tipodetfactura', [tipodetfacturaController::class, 'store'])->name('tipos_detalle_factura.store');
Route::get('/Tipodetfactura/create', [tipodetfacturaController::class, 'create'])->name('tipos_detalle_factura.create');
Route::put('/Tipodetfactura/{tdf}', [tipodetfacturaController::class, 'update'])->name('tipos_detalle_factura.update');
Route::delete('/Tipodetfactura/{tdf}', [tipodetfacturaController::class, 'destroy'])->name('tipos_detalle_factura.destroy');
Route::get('/Tipodetfactura/{tdf}/edit', [tipodetfacturaController::class, 'edit'])->name('tipos_detalle_factura.edit');


//Rutas de Generos
Route::get('/generos', [GenerosController::class, 'index'])->name('Generos.index');
Route::post('/generos', [GenerosController::class, 'store'])->name('Generos.store');
Route::get('/generos/create', [GenerosController::class, 'create'])->name('Generos.create');
Route::put('/generos/{gen}', [GenerosController::class, 'update'])->name('Generos.update');
Route::delete('/generos/{gen}', [GenerosController::class, 'destroy'])->name('Generos.destroy');
Route::get('/generos/{gen}/edit', [GenerosController::class, 'edit'])->name('Generos.edit');


// Rutas de Paises
Route::get('/paises', [PaisesController::class, 'index'])->name('paises.index');
Route::post('/paises', [PaisesController::class, 'store'])->name('paises.store');
Route::get('/paises/create', [PaisesController::class, 'create'])->name('paises.create');
Route::get('/paises/{pais}', [PaisesController::class, 'show'])->name('paises.show');
Route::put('/paises/{pais}', [PaisesController::class, 'update'])->name('paises.update');
Route::delete('/paises/{pais}', [PaisesController::class, 'destroy'])->name('paises.destroy');
Route::get('/paises/{pais}/edit', [PaisesController::class, 'edit'])->name('paises.edit');


//Rutas de Formas Pago
Route::get('/Formas_pago', [Formas_pagoController::class, 'index'])->name('Formas_pago.index');
Route::post('/Formas_pago', [Formas_pagoController::class, 'store'])->name('Formas_pago.store');
Route::get('/Formas_pago/create', [Formas_pagoController::class, 'create'])->name('Formas_pago.create');
Route::get('/panel/Formas_pago/{Formas_pago}', [Formas_pagoController::class, 'show'])->name('Formas_pago.show');
Route::put('/Formas_pago/{Formas_pago}', [Formas_pagoController::class, 'update'])->name('Formas_pago.update');
Route::delete('/Formas_pago/{Formas_pago}', [Formas_pagoController::class, 'destroy'])->name('Formas_pago.destroy');
Route::get('/Formas_pago/{Formas_pago}/edit', [Formas_pagoController::class, 'edit'])->name('Formas_pago.edit');


//Rutas de Dias
Route::get('/dias', [DiasController::class, 'index'])->name('dias.index');
Route::post('/dias', [DiasController::class, 'store'])->name('dias.store');
Route::get('/dias/create', [DiasController::class, 'create'])->name('dias.create');
Route::put('/dias/{dia}', [DiasController::class, 'update'])->name('dias.update');
Route::delete('/dias/{dia}', [DiasController::class, 'destroy'])->name('dias.destroy');
Route::get('/dias/{dia}/edit', [DiasController::class, 'edit'])->name('dias.edit');

// Rutas de Cargos
Route::get('/cargos', [CargosController::class, 'index'])->name('cargos.index');
Route::post('/cargos', [CargosController::class, 'store'])->name('cargos.store');
Route::get('/cargos/create', [CargosController::class, 'create'])->name('cargos.create');
Route::put('/cargos/{cargo}', [CargosController::class, 'update'])->name('cargos.update');
Route::delete('/cargos/{cargo}', [CargosController::class, 'destroy'])->name('cargos.destroy');
Route::get('/cargos/{cargo}/edit', [CargosController::class, 'edit'])->name('cargos.edit');


//Rutas de Tipo de Factura
Route::get('/Tipo_factura', [TipoFacturaController::class, 'index'])->name('Tipo_factura.index');
Route::post('/Tipo_factura', [TipoFacturaController::class, 'store'])->name('Tipo_factura.store');
Route::get('/Tipo_factura/create', [TipoFacturaController::class, 'create'])->name('Tipo_factura.create');
Route::put('/Tipo_factura/{fac}', [TipoFacturaController::class, 'update'])->name('Tipo_factura.update');
Route::delete('/Tipo_factura/{fac}', [TipoFacturaController::class, 'destroy'])->name('Tipo_factura.destroy');
Route::get('/Tipo_factura/{fac}/edit', [TipoFacturaController::class, 'edit'])->name('Tipo_factura.edit');


//Rutas de Deportes
Route::get('/deportes', [DeportesController::class, 'index'])->name('deportes.index');
Route::post('/deportes', [DeportesController::class, 'store'])->name('deportes.store');
Route::get('/deportes/create', [DeportesController::class, 'create'])->name('deportes.create');
Route::put('/deportes/{deporte}', [DeportesController::class, 'update'])->name('deportes.update');
Route::delete('/deportes/{deporte}', [DeportesController::class, 'destroy'])->name('deportes.destroy');
Route::get('/deportes/{deporte}/edit', [DeportesController::class, 'edit'])->name('deportes.edit');


// Rutas de instalaciones
Route::get('/instalaciones', [InstalacionesController::class, 'index'])->name('instalaciones.index');
Route::post('/instalaciones', [InstalacionesController::class, 'store'])->name('instalaciones.store');
Route::get('/instalaciones/create', [InstalacionesController::class, 'create'])->name('instalaciones.create');
Route::put('/instalaciones/{instalacion}', [InstalacionesController::class, 'update'])->name('instalaciones.update');
Route::delete('/instalaciones/{instalacion}', [InstalacionesController::class, 'destroy'])->name('instalaciones.destroy');
Route::get('/instalaciones/{instalacion}/edit', [InstalacionesController::class, 'edit'])->name('instalaciones.edit');


//Rutas de Provincias
Route::get('/Provincias', [ProvinciasController::class, 'index'])->name('Provincias.index');
Route::post('/Provincias', [ProvinciasController::class, 'store'])->name('Provincias.store');
Route::get('/Provincias/create', [ProvinciasController::class, 'create'])->name('Provincias.create');
Route::put('/Provincias/{prov}', [ProvinciasController::class, 'update'])->name('Provincias.update');
Route::delete('/Provincias/{prov}', [ProvinciasController::class, 'destroy'])->name('Provincias.destroy');
Route::get('/Provincias/{prov}/edit', [ProvinciasController::class, 'edit'])->name('Provincias.edit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/