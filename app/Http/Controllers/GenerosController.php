<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\generos;

class GenerosController extends Controller
{
    public function index () {

        $generos = generos::paginate(3);

        return view('panel.generos.index', compact('generos'));
    }

    public function create () {
        return view('panel.generos.create');
    }

    public function store (Request $request) {
        //valid

        //Guardado de los datos
        generos::create($request->all());

        //Redir
        return redirect()->route('generos.index')->with('status', 'Genero creado correctamente');
    }

    public function edit($cod_genero) {
        $generos = generos::findOrFail($cod_genero);
        return view('panel.generos.edit', ['generos' => $generos]);
    }

    public function update(Request $request, $cod_genero){
        //busqueda
        $generos = generos::findOrFail($cod_genero);
        //valid

        //actualizacion
        $generos->update($request->all());

        //redireccion
        return redirect()->route('generos.index')->with('status', 'Genero Actualizado correctamente');
    }

    public function destroy($id) {
        //busqueda
        $generos = generos::findOrFail($id);

        //elminacion
        $generos->delete();

        //redireccion
        return redirect()->route('generos.index')->with('status', 'Genero eliminado correctamente');
    }
}
