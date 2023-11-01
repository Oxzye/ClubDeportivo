<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paises;

class PaisesController extends Controller
{
    public function index () {

        $paises = Paises::all();

        return view('panel.paises.index', compact('paises'));
    }

    public function create () {
        return view('panel.paises.create');
    }

    public function store (Request $request) {
        //valid

        //Guardado de los datos
        Paises::create($request->all());

        //Redir
        return redirect()->route('paises.index')->with('status', 'País creado correctamente');
    }

    public function edit($id_pais) {
        $pais = Paises::findOrFail($id_pais);
        return view('panel.paises.edit', ['pais' => $pais]);
    }

    public function update(Request $request, $id_pais){
        //busqueda
        $pais = Paises::findOrFail($id_pais);
        //valid

        //actualizacion
        $pais->update($request->all());

        //redireccion
        return redirect()->route('paises.index')->with('status', 'País Actualizado correctamente');
    }

    public function destroy($id) {
        //busqueda
        $pais = Paises::findOrFail($id);

        //elminacion
        $pais->delete();

        //redireccion
        return redirect()->route('paises.index')->with('status', 'País eliminado correctamente');
    }
}

