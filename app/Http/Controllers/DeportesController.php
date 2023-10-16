<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deporte;

class DeportesController extends Controller
{
    public function index() {
        
        $deportes = Deporte::all();

        return view('deportes.index', compact('deportes'));
    }
    
    public function create () {
        return view('deportes.create');
    }

    public function store(Request $request)
    {
        //valid

        //Guardado de los datos
        Deporte::create($request->all());

        //Redir
        return redirect()->route('deportes.index')->with('status', 'deporte creado correctamente');
    }

    public function edit($id_dep){
        $deporte = Deporte::findOrFail($id_dep);
        return view('deportes.edit', ['deporte' => $deporte]);
    }

    public function update(Request $request, $id_dep){
        //busqueda
        $deporte = Deporte::findOrFail($id_dep);
        //valid

        //actualizacion
        $deporte->update($request->all());

        //redir
        return redirect()->route('deportes.index')->with('status', 'deporte Actualizado correctamente');
    }

    public function destroy($id){
        //busqueda
        $deporte = Deporte::findOrFail($id);

        //eliminacion
        $deporte->delete();

        //redireccion
        return redirect()->route('deportes.index')->with('status', 'deporte eliminado correctamente');
    }
}
