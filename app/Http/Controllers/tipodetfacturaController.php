<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipodetfactura;
class TipodetfacturaController extends Controller
{
     public function index () {

        $tdf = tipodetfactura::pagiante(3);

        return view('panel.tipos_detalle_factura.index', compact('tdf'));
    }

    public function create () {
        return view('panel.tipos_detalle_factura.create');
    }

    public function store (Request $request) {
        //valid

        //Guardado de los datos
        Tipodetfactura::create($request->all());

        //Redir
        return redirect()->route('tipos_detalle_factura.index')->with('status', 'Tipo de detalle de factura creado correctamente');
    }

    public function edit($id_tipodetallefactura) {
        $tdf = Tipodetfactura::findOrFail($id_tipodetallefactura);
        return view('panel.tipos_detalle_factura.edit', ['tipos_detalle_factura' => $tdf]);
    }

    public function update(Request $request, $id_tipodetallefactura){
        //busqueda
        $tdf = Tipodetfactura::findOrFail($id_tipodetallefactura);
        //valid

        //actualizacion
        $tdf->update($request->all());

        //redireccion
        return redirect()->route('tipos_detalle_factura.index')->with('status', 'Tipo de detalle de factura Actualizado correctamente');
    }

    public function destroy($id) {
        //busqueda
        $tdf = Tipodetfactura::findOrFail($id);

        //elminacion
        $tdf->delete();

        //redireccion
        return redirect()->route('tipos_detalle_factura.index')->with('status', 'Tipo de detalle de factura eliminado correctamente');
    }
}

