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
use App\Http\Controllers\DiasxActController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\EmpleadosxActividadesController;
use App\Http\Controllers\SociosxActividadesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FacturacionController;
use App\Http\Controllers\DetallesFacturaController;
use App\Http\Controllers\CuotasController;

use App\Models\Cajas;
use App\Models\Deporte;
use App\Models\Empleado;
use App\Models\Instalacion;
use App\Models\Socio;
use Psy\VersionUpdater\Installer;

Route::get('/', function () {
        $cajasAbiertas = Cajas::where('estado_caja', 1)->count();
        $saldo_cajas = Cajas::where('estado_caja', 1)->sum('saldo_caja');
        
        $deport = Deporte::all()->count();
        $instalation = Instalacion::all()->count();

        $sociosAct = Socio::all()->count();

        $empleadosAct = Empleado::all()->count();

        return view('panel.index', compact('cajasAbiertas', 'saldo_cajas', 'deport', 'instalation', 'sociosAct', 'empleadosAct'));
});


Route::get('/socios/dadosdebaja', [SociosController::class, 'dadosdebaja'])->name('socios.dadosdebaja');
Route::get('/socios/restore/{id}', [SociosController::class, 'restore'])->name('socios.restore');
Route::get('/socios/resetPassword', [SociosController::class, 'resetPassword'])->name('socios.resetPassword');
Route::resource('/socios', SociosController::class)->names('socios');
Route::get('/exportar-socios-pdf', [SociosController::class, 'exportarSociosPDF'])->name('exportar-socios-pdf');
Route::get('/exportar-socios-excel', [SociosController::class, 'exportarSociosExcel'])->name('exportar-socios-excel');
Route::get('/exportar-sociosBaja-excel', [SociosController::class, 'exportarSociosBajaExcel'])->name('exportar-sociosBaja-excel');

Route::get('/empleados/dadosdebaja', [EmpleadosController::class, 'dadosdebaja'])->name('empleados.dadosdebaja');
Route::get('/empleados/restore/{id}', [EmpleadosController::class, 'restore'])->name('empleados.restore');
Route::resource('/empleados', EmpleadosController::class)->names('empleados');
Route::get('/exportar-empleados-pdf', [EmpleadosController::class, 'exportarEmpleadosPDF'])->name('exportar-empleados-pdf');
Route::get('/exportar-empleados-excel', [EmpleadosController::class, 'exportarEmpleadosExcel'])->name('exportar-empleados-excel');

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

Route::resource('/Disponibilidades', DisponibilidadesController::class)->names('Disponibilidades');

Route::get('/exportar-disponibilidades-excel', [DisponibilidadesController::class, 'exportarDisponibilidadesExcel'])->name('exportar-disponibilidades-excel');

Route::resource('/Actividades', ActividadesController::class)->names('Actividades');
Route::get('/exportar-actividades-pdf', [ActividadesController::class, 'exportarActividadesPDF'])->name('exportar-actividades-pdf');
Route::get('/exportar-actividades-excel', [ActividadesController::class, 'exportarActividadesExcel'])->name('exportar-actividades-excel');

Route::resource('/DiasxAct', DiasxActController::class)->names('DiasxAct');
Route::get('/exportar-diasxact-excel', [DiasxActController::class, 'exportarDiasxActExcel'])->name('exportar-diasxact-excel');

Route::resource('/SocxAct', SociosxActividadesController::class)->names('SocxAct');
Route::get('/exportar-socxact-excel', [SociosxActividadesController::class, 'exportarSocxActExcel'])->name('exportar-socxact-excel');
Route::get('graficos-socxact',[SociosxActividadesController::class,'graficosSocxAct'])->name('graficos-socxact');

Route::resource('/EmpxAct', EmpleadosxActividadesController::class)->names('EmpxAct');
Route::get('graficos-empxact',[EmpleadosxActividadesController::class,'graficosEmpxAct'])->name('graficos-empxact');
Route::get('/exportar-empxact-excel', [EmpleadosxActividadesController::class, 'exportarEmpxactExcel'])->name('exportar-empxact-excel');

Route::resource('/clientes', ClientesController::class)->names('clientes');

Route::resource('/facturas', FacturacionController::class)->names('facturas');
Route::put('/products/{id}/update-payment-status', 'ProductController@updatePaymentStatus');

Route::resource('/Detalle_fact', DetallesFacturaController::class)->names('Detalle_fact');
Route::post('/guardar-detalles', 'DetallesFacturaController@guardarDetalles')->name('guardar-detalles');


Route::get('/cuota_social/{dni}/cobrar', [CuotasController::class, 'cobrar'])->name('cuota_social.cobrar');

Route::resource("/cuota_social", CuotasController::class)->names('cuota_social');

