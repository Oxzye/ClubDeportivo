<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dias;

class DiasController extends Controller
{
    public function index () {

        $dias = Dias::all();

        return view('panel.dias.index', compact('dias'));
    }

    public function create () {
        return view('panel.dias.create');
    }

    public function store (Request $request) {
        //valid

        //Guardado de los datos
        Dias::create($request->all());

        //Redir
        return redirect()->route('dias.index')->with('status', 'Dias creado correctamente');
    }

    public function edit($id_dia) {
        $dia = Dias::findOrFail($id_dia);
        return view('panel.dias.edit', ['dia' => $dia]);
    }

    public function update(Request $request, $id_dia){
        //busqueda
        $dia = Dias::findOrFail($id_dia);
        //valid

        //actualizacion
        $dia->update($request->all());

        //redireccion
        return redirect()->route('dias.index')->with('status', 'Dia Actualizado correctamente');
    }

    public function destroy($id) {
        //busqueda
        $dia = Dias::findOrFail($id);

        //elminacion
        $dia->delete();

        //redireccion
        return redirect()->route('dias.index')->with('status', 'Dia eliminado correctamente');
    }
}
