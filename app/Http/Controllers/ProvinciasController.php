<?php

namespace App\Http\Controllers;

use App\Models\Provincias;
use Illuminate\Http\Request;
class ProvinciasController extends Controller
{
    public function index () {

        $provincia = Provincias::all();

        return view('Provincias.index', compact('provincia'));
    }

    public function create () {
        return view('Provincias.create');
    }

    public function store (Request $request) {
        //valid

        //Guardado de los datos
        Provincias::create($request->all());

        //Redir
        return redirect()->route('Provincias.index')->with('status', 'Provincia creado correctamente');
    }

    public function edit($id_prov) {
        $provincia = Provincias::findOrFail($id_prov);
        return view('Provincias.edit', ['provincia' => $provincia]);
    }

    public function update(Request $request, $id_prov){
        //busqueda
        $provincia = Provincias::findOrFail($id_prov);
        //valid

        //actualizacion
        $provincia->update($request->all());

        //redireccion
        return redirect()->route('Provincias.index')->with('status', 'Provincia Actualizada correctamente');
    }

    public function destroy($id) {
        //busqueda
        $provincia = Provincias::findOrFail($id);

        //elminacion
        $provincia->delete();

        
        return redirect()->route('Provincias.index')->with('status', 'Provincia eliminada correctamente');
    }
}
