<?php

use App\Models\Instalacion;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SociosController;
use App\Http\Controllers\InstalacionesController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\PaisesController;

Route::get('/', function(){
        return view('panel.index');
});

Route::resource('/socios', SociosController::class)->names('socios');

Route::resource('/instalaciones', InstalacionesController::class)->names('instalaciones');

Route::resource('/cargos', CargosController::class)->names('cargos');

Route::resource('/paises', PaisesController::class)->names('paises');