<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalles_Factura;
use App\Models\Facturacion;
use App\Models\Actividad;
use App\Models\tipodetfactura;
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
        $facturacion = Facturacion::all();
        return view('panel.Detalle_fact.create', compact('detallefact', 'tipodetfact', 'actividad', 'facturacion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $factura = Facturacion::orderBy('id_caja', 'desc')->first();
        $idfact = $factura->num_fac;
        // $detallefact = new Detalles_Factura();

        // $detallefact->id_act = $request->get('id_act');
        // $detallefact->num_fac = $idfact;
        // $detallefact->id_tipodetallefactura = $request->get('id_tipodetfact');
        
        // $detallefact->save();
    
        $detallesAdicionales = $request->input('detalles');

        foreach ($detallesAdicionales as $detalle) {
            $detallefact = new Detalles_Factura();
            $detallefact->id_act = $detalle['id_act'];
            $detallefact->num_fac = $idfact;
            $detallefact->id_tipodetallefactura = $detalle['id_tipodetfact'];
           
            $detallefact->save();
        }
        

    
        return redirect()
            ->route('facturas.create')
            ->with('alert', 'Detalles agregados exitosamente.');
    }
    /**
     * Display the specified resource.
     */
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
    public function destroy(string $id)
    {
        //
    }

}
