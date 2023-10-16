<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tipodetfacturaController;
use App\Http\Controllers\GenerosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Rutas de Tipo de detalle de facturas
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