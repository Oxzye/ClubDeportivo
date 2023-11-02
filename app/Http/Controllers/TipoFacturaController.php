<?php

namespace App\Http\Controllers;
use App\Models\Tipo_factura;
use Illuminate\Http\Request;

class TipoFacturaController extends Controller
{
    public function index () {

        $Tipo_factura = Tipo_factura::all();

        return view('panel.Tipo_factura.index', compact('Tipo_factura'));
    }

    public function create () {
        return view('panel.Tipo_factura.create');
    }

    public function store (Request $request) {
        //valid

        //Guardado de los datos
        Tipo_factura::create($request->all());

        //Redir
        return redirect()->route('Tipo_factura.index')->with('status', 'Tipo de Factura creado correctamente');
    }

    public function edit($id_tipo_fac)
        {
            $Tipo_factura= Tipo_factura::findOrFail($id_tipo_fac);
            return view('panel.Tipo_factura.edit', ['Tipo_factura'=>$Tipo_factura]);
        }
    public function update(Request $request, $id_tipo_fac){
        $Tipo_factura= Tipo_factura::findOrFail($id_tipo_fac);
        $Tipo_factura->update($request->all());
        return redirect()->route('Tipo_factura.index')->with('status','Tipo de factura actualizada correctamente');
    }

    public function destroy($id_tipo_fac)
        {
            $Tipo_factura= Tipo_factura::findOrFail($id_tipo_fac);
            $Tipo_factura->delete();

            return redirect()->route('Tipo_factura.index')->with('status','Producto eliminado correctamente');
        }
}
