<?php

namespace App\Http\Controllers;
use App\Models\Tipo_factura;
use Illuminate\Http\Request;

class TipoFacturaController extends Controller
{
    public function index () {

        $Tipo_factura = Tipo_factura::all();

        return view('Tipo_factura.index', compact('Tipo_factura'));
    }

    public function create () {
        return view('Tipo_factura.create');
    }

    public function store (Request $request) {
          //Validacion de los Datos
          $validated=$request->validate(
            [
                "tipo_fac"=>"required|string|max:2",
            ]);
        //Guardado de los datos
        Tipo_factura::create($request->all());

        //Redireccionar
        return redirect()->route('Tipo_factura.index')->with('status', 'Tipo de Factura creado correctamente');
    }

    public function edit($id_tipo_fac)
        {
            $Tipo_factura= Tipo_factura::findOrFail($id_tipo_fac);
            return view('Tipo_factura.edit', ['Tipo_factura'=>$Tipo_factura]);
        }
    public function update(Request $request, $id_tipo_fac){
        //Busqueda
        $Tipo_factura= Tipo_factura::findOrFail($id_tipo_fac);
        //Validacion de los Datos
        $validated=$request->validate(
            [
                "tipo_fac"=>"required|string|max:2",
            ]);

        //Guardado de los datos
        $Tipo_factura->update($request->all());
        return redirect()->route('Tipo_factura.index')->with('status','Tipo de factura actualizada correctamente');
    }

    public function destroy($id_tipo_fac)
        {
            $Tipo_factura= Tipo_factura::findOrFail($id_tipo_fac);
            $Tipo_factura->delete();

            return redirect()->route('Tipo_factura.index')->with('status','Producto eliminado correctamente');
        }

    public function show($id_tipo_fac)
    {
        $Tipo_factura=Tipo_factura::findOrFail($id_tipo_fac);
        return view('Tipo_factura.show',['tipo_fac'=>$Tipo_factura]);
    }
}
