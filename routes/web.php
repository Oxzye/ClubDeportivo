<?php

use App\Http\Controllers\DeportesController;
use App\Http\Controllers\Formas_pagoController;
use App\Http\Controllers\PaisesController;
use App\Http\Controllers\DiasController;
use App\Http\Controllers\InstalacionesController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas de Paises
Route::get('/paises', [PaisesController::class, 'index'])->name('paises.index');
Route::post('/paises', [PaisesController::class, 'store'])->name('paises.store');
Route::get('/paises/create', [PaisesController::class, 'create'])->name('paises.create');
Route::put('/paises/{pais}', [PaisesController::class, 'update'])->name('paises.update');
Route::delete('/paises/{pais}', [PaisesController::class, 'destroy'])->name('paises.destroy');
Route::get('/paises/{pais}/edit', [PaisesController::class, 'edit'])->name('paises.edit');

//Rutas de Formas Pago
Route::get('/Formas_pago', [Formas_pagoController::class, 'index'])->name('Formas_pago.index');
Route::post('/Formas_pago', [Formas_pagoController::class, 'store'])->name('Formas_pago.store');
Route::get('/Formas_pago/create', [Formas_pagoController::class, 'create'])->name('Formas_pago.create');
Route::put('/Formas_pago/{fdp}', [Formas_pagoController::class, 'update'])->name('Formas_pago.update');
Route::delete('/Formas_pago/{fdp}', [Formas_pagoController::class, 'destroy'])->name('Formas_pago.destroy');
Route::get('/Formas_pago/{fdp}/edit', [Formas_pagoController::class, 'edit'])->name('Formas_pago.edit');

//Rutas de Dias
Route::get('/dias', [DiasController::class, 'index'])->name('dias.index');
Route::post('/dias', [DiasController::class, 'store'])->name('dias.store');
Route::get('/dias/create', [DiasController::class, 'create'])->name('dias.create');
Route::put('/dias/{dia}', [DiasController::class, 'update'])->name('dias.update');
Route::delete('/dias/{dia}', [DiasController::class, 'destroy'])->name('dias.destroy');
Route::get('/dias/{dia}/edit', [DiasController::class, 'edit'])->name('dias.edit');

//Rutas de Deportes
Route::get('/deportes', [DeportesController::class, 'index'])->name('deportes.index');
Route::post('/deportes', [DeportesController::class, 'store'])->name('deportes.store');
Route::get('/deportes/create', [DeportesController::class, 'create'])->name('deportes.create');
Route::put('/deportes/{deporte}', [DeportesController::class, 'update'])->name('deportes.update');
Route::delete('/deportes/{deporte}', [DeportesController::class, 'destroy'])->name('deportes.destroy');
Route::get('/deportes/{deporte}/edit', [DeportesController::class, 'edit'])->name('deportes.edit');

//Rutas de instalaciones
Route::get('/instalaciones', [InstalacionesController::class, 'index'])->name('instalaciones.index');
Route::post('/instalaciones', [InstalacionesController::class, 'store'])->name('instalaciones.store');
Route::get('/instalaciones/create', [InstalacionesController::class, 'create'])->name('instalaciones.create');
Route::put('/instalaciones/{instalacion}', [InstalacionesController::class, 'update'])->name('instalaciones.update');
Route::delete('/instalaciones/{instalacion}', [InstalacionesController::class, 'destroy'])->name('instalaciones.destroy');
Route::get('/instalaciones/{instalacion}/edit', [InstalacionesController::class, 'edit'])->name('instalaciones.edit');