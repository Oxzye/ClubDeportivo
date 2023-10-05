<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formas_pago;

class Formas_pagoController extends Controller
{
    public function index () {

        $Formas_pago = Formas_pago::all();

        return view('Formas_pago.index', compact('Formas_pago'));
    }

    public function create () {
        return view('Formas_pago.create');
    }

    public function store (Request $request) {
        //valid

        //Guardado de los datos
        Formas_pago::create($request->all());

        //Redir
        return redirect()->route('Formas_pago.index')->with('status', 'Forma de pago creado correctamente');
    }

    public function edit($id_fdp) {
        $fdp = Formas_pago::findOrFail($id_fdp);
        return view('Formas_pago.edit', ['Formas_pago' => $fdp]);
    }

    public function update(Request $request, $id_fdp){
        //busqueda
        $fdp = Formas_pago::findOrFail($id_fdp);
        //valid

        //actualizacion
        $fdp->update($request->all());

        //redireccion
        return redirect()->route('Formas_pago.index')->with('status', 'Forma de pago Actualizado correctamente');
    }

    public function destroy($id) {
        //busqueda
        $fdp = Formas_pago::findOrFail($id);

        //elminacion
        $fdp->delete();

        //redireccion
        return redirect()->route('Formas_pago.index')->with('status', 'Forma de pago eliminado correctamente');
    }
}

