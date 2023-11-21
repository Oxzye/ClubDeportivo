<?php
namespace App\Traits;
use App\Models\Detalles_Factura;
use App\Models\Facturacion;
use App\Models\Actividad;
use App\Models\tipodetfactura;
use App\Models\Cajas;
use App\Models\Formas_pago;
use App\Models\Tipo_factura;
use App\Models\Socio;
use App\Models\clientes;
trait FacturaLogic
{
    protected function loadDetalleFactView()
    {
        $cajaAbierta = Cajas::where('estado_caja', true)->first();
        
        if (!$cajaAbierta) {
            return redirect()->route('facturas.index')->with('error', 'No hay cajas abiertas. No se pueden crear facturas.');
        }
        $detallefact = new Detalles_Factura();
        $tipodetfact = tipodetfactura::all();
        $actividad = Actividad::all();
        $facturacion = Facturacion::all();
       
        $clientes = clientes::all();
        $cajas = Cajas::all();
        $formdp = Formas_pago::all();
        $tipofac = Tipo_factura::all();
        $socio = Socio::all();
        // return view('panel.Detalle_fact.create', compact('detallefact', 'tipodetfact', 'actividad', 'facturacion'));
        return view('panel.facturas.create', compact('facturacion', 'cajas','formdp', 'tipofac', 'socio', 'clientes', 'cajaAbierta','detallefact', 'tipodetfact', 'actividad', 'facturacion'));
    }
}
