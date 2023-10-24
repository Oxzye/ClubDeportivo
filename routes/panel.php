<?php

use App\Http\Controllers\SociosController;
use App\Models\Instalacion;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstalacionesController;

Route::get('/', function(){
        return view('panel.index');
});

Route::resource('/socios', SociosController::class)->names('socios');

Route::resource('/instalaciones', InstalacionesController::class)->names('instalaciones');
