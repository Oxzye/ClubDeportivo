<?php

use App\Http\Controllers\DiasController;
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

//Rutas de Dias
Route::get('/dias', [DiasController::class, 'index'])->name('dias.index');
Route::post('/dias', [DiasController::class, 'store'])->name('dias.store');
Route::get('/dias/create', [DiasController::class, 'create'])->name('dias.create');
Route::put('/dias/{dia}', [DiasController::class, 'update'])->name('dias.update');
Route::delete('/dias/{dia}', [DiasController::class, 'destroy'])->name('dias.destroy');
Route::get('/dias/{dia}/edit', [DiasController::class, 'edit'])->name('dias.edit');