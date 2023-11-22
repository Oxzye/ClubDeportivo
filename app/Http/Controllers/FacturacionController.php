<?php

namespace App\Http\Controllers;
use App\Models\Facturacion;
use App\Models\Cajas;
use App\Models\Formas_pago;
use App\Models\Tipo_factura;
use App\Models\Socio;
use App\Models\clientes;
use Illuminate\Http\Request;
use Carbon\Carbon;


class FacturacionController extends Controller
{

    public function index () {
        $cajasAbierta = Cajas::where('estado_caja', true)->first();

       
        //$clientes = new Cajas;
        $facturacion = Facturacion::all();
        $cajas = Cajas::all();
        $clientes = clientes::all();
        $cajaso = Cajas::orderBy('id_caja', 'desc')->get();
        $cajaAbierta = $cajaso->where('estado_caja', true);
        return view('panel.facturas.index', compact('facturacion', 'cajas', 'clientes', 'cajasAbierta'));
    }

    public function create () {
        $cajaAbierta = Cajas::where('estado_caja', true)->first();
        
        if (!$cajaAbierta) {
            return redirect()->route('facturas.index')->with('error', 'No hay cajas abiertas. No se pueden crear facturas.');
        }
        
        $facturacion = Facturacion::all();
        $clientes = clientes::all();
        $cajas = Cajas::all();
        $formdp = Formas_pago::all();
        $tipofac = Tipo_factura::all();
        $socio = Socio::all();
        // $detallefact = null;
        return view('panel.facturas.create', compact('facturacion', 'cajas','formdp', 'tipofac', 'socio', 'clientes', 'cajaAbierta'));
 
    }

    public function store (Request $request) {
        //valid
        $cajasAbierta = Cajas::where('estado_caja', true)->first();

        if (!$cajasAbierta) {
            return redirect()->route('facturas.index')->with('error', 'No hay cajas abiertas. No se pueden crear facturas.');
        }
        if ($request->get('pagada_fac') == 1){
            $fecha_pago = Carbon::now();
        }else {
            $fecha_pago = null;
        }
        $idCajaAbierta = $cajasAbierta->id_caja;
        $facturacion = new Facturacion();
        //Guardado de los datos
        $facturacion->id_caja = $idCajaAbierta;
        $facturacion->id_fdp = $request->get('id_fdp');
        $facturacion->tipo_fac = $request->get('tipo_fac');
        $facturacion->dni_soc = $request->get('dni_soc');
        $facturacion->dni_cli = $request->get('dni_cli');
        $facturacion->monto_fac = $request->get('monto_fac');
        $facturacion->pagada_fac = $request->get('pagada_fac');
        $facturacion->fecha_pago_fac = $fecha_pago;
       
        $facturacion ->save();
        $cajas = Cajas::findOrFail($idCajaAbierta);
    
        $cajas->total_ventas_caja += 1; // Incrementar la cantidad de ventas
        $cajas->monto_final += $facturacion->monto_fac; // Incrementar el monto recaudado

        $cajas->save();
        

        
        //Redir
        //echo '<script>showCajaIndicator();</script>';
       return redirect()->route('Detalle_fact.create')->with('status', 'Factura realizada correctamente');
    }

    public function edit($num_fac) {
        $facturas = Facturacion::findOrFail($num_fac);
        $clientes = clientes::all();
        $cajas = Cajas::all();
        $formdp = Formas_pago::all();
        $tipofac = Tipo_factura::all();
        $socio = Socio::all();
        if ($facturas) {
            return view('panel.facturas.edit', compact('facturas', 'clientes', 'cajas','formdp', 'tipofac', 'socio'));
        } else {
            return redirect()->route('Facturas.index')->with('error', 'Factura no encontrada');
        }
    }

    public function update(Request $request, $id){
        //$clientes = Paises::all();
        $facturacion = Facturacion::findOrFail($id);
        $facturacion->id_caja = $request->get('id_caja');
        $facturacion->id_fdp = $request->get('id_fdp');
        $facturacion->tipo_fac = $request->get('tipo_fac');
        $facturacion->dni_soc = $request->get('dni_soc');
        $facturacion->dni_cli = $request->get('dni_cli');
        $facturacion->monto_fac = $request->get('monto_fac');
        $facturacion->pagada_fac = $request->get('pagada_fac');
       
        $facturacion ->save();
        
        //echo '<script>hideCajaIndicator();</script>';
        //redireccion
        return redirect()->route('facturas.index')->with('status', 'Factura actualizada correctamente');
    }

    public function destroy($id) {
        //busqueda
        $facturas = Facturacion::findOrFail($id);

        //elminacion
        $facturas->delete();

        
        return redirect()->route('facturas.index')->with('status', 'Factura eliminada correctamente');
    }
//     public function updatePaymentStatus($id)
// {
//     $facturacion = Facturacion::find($id);

//     if (!$facturacion) {
//         return response()->json(['error' => 'factura no encontrado'], 404);
//     }

//     $facturacion->update(['pagada_fac' => request('pagada_fac')]);

//     return response()->json(['message' => 'Estado de pago actualizado con éxito']);
// }
//     public function show($id)
//     {
//         // Lógica para mostrar una caja específica por su ID
//         $cajas = Cajas::findOrFail($id);
//         $cajaso = Cajas::orderBy('id_caja', 'desc')->get();
//         $cajaAbierta = $cajaso->where('estado_caja', true);
//         // Puedes pasar la caja a una vista o realizar cualquier otra lógica necesaria
//         return view('panel.Cajas.index', compact('cajas','cajaAbierta'));
//     }
}
