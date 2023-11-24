<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalles_Factura;
use App\Models\Facturacion;
use App\Models\Actividad;
use App\Models\tipodetfactura;
use App\Models\Cajas;
class DetallesFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detallefact = new Detalles_Factura();
        $tipodetfact = tipodetfactura::all();
        $actividad = Actividad::all();
        // $facturacion =  Facturacion::all();
        $factura = Facturacion::latest('id_caja')->first();
        $facturacion = $factura->num_fac;
        $detalles = [];
        
        $detallesf= Detalles_Factura::with(['tipodetfact','actividad'])
        ->where('num_fac', $facturacion)->get();
        // dd($detallesf);
        return view('panel.Detalle_fact.create', compact('detallefact', 'tipodetfact', 'actividad', 'facturacion','detalles', 'detallesf'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $factura = Facturacion::latest('id_caja')->first();
        $idfact = $factura->num_fac;
        $idcaja = $factura->id_caja;
        $detallesAdicionales = $request->input('detalles');
    
        foreach ($detallesAdicionales as $detalle) {
            $detallefact = new Detalles_Factura();
            $detallefact->id_act = $detalle['id_act'];
            $detallefact->num_fac = $idfact;
            $detallefact->id_tipodetallefactura = $detalle['id_tipodetfact'];
            $detallefact->save();
        }
    
        $montoFac = Detalles_Factura::where('num_fac', $idfact)
        ->join('tipos_detalle_factura', 'detalles_factura.id_tipodetallefactura', '=', 'tipos_detalle_factura.id_tipodetallefactura')
        ->sum('tipos_detalle_factura.precio_tdf');
        // Actualiza la factura con el monto_fac
        Facturacion::where('num_fac', $idfact)->update(['monto_fac' => $montoFac]);
        
         $caja = Cajas::findOrFail($idcaja);
         $caja->monto_final += $montoFac; // Incrementar el monto recaudado
         $caja->save();  
        // Verifica si hay formularios registrados en la base de datos
        $formulariosRegistrados = Detalles_Factura::where('num_fac', $idfact)->count();
    
        if ($formulariosRegistrados > 0) {
            // Si hay formularios registrados, redirige a la misma vista (sin mensaje de éxito)
            return redirect()->back();
        } else {
            // Si no hay formularios registrados, redirige a facturas.create con el mensaje de éxito
            return redirect()->route('facturas.create')->with('alert', 'Detalles agregados exitosamente.');
        }
        
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detallefact = Detalles_Factura::find($id);

        $detallefact->id_act = $request->get('id_act');
        $detallefact->num_fac = $request->get('num_fac');
        $detallefact->id_tipodetallefactura = $request->get('tipodetfact');
        $detallefact->precio = $request->get('precio_df');
        
        //$detallefact->vendedor_id = auth()->user()->id;
        // Almacena la info del producto en la BD
        $detallefact->save();
        return redirect()
            ->route('factura.create')
            ->with('alert', 'item "' . $detallefact->id_tipodetallefactura . '" actualizado exitosamente.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Detalle_fact =Detalles_Factura::findOrFail($id);

        //elminacion
        $Detalle_fact->delete();

        
        return redirect()->route('Detalle_fact.create')->with('status', 'Item eliminado correctamente');
    }

    public function finalizarfact($num_fac)
    {
        
        $facturas = Facturacion::with('formas_pago')->findOrfail($num_fac);
        $facturas->load('dnisocio', 'client', 'Tipo_fac');
        //dd($facturas);
        $detalles= Detalles_Factura::with(['tipodetfact','actividad'])
        ->where('num_fac', $num_fac)->get();
        
        if (!$facturas) {
        // Manejar el caso donde no se encuentra la factura con el número dado
        abort(404);
        }
        return view('panel.Detalle_fact.fin_factura', compact('facturas','detalles'));
    }

}
