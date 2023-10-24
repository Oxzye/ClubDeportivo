<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instalacion;

class InstalacionesController extends Controller
{
    public function index () {
        $instalaciones = Instalacion::all();
        return view('panel.instalaciones.index', compact('instalaciones')); 
    }

    public function create () {
        return view('panel.instalaciones.create');
    }

    public function store (Request $request) {
        //valid

        //guardado
        Instalacion::create($request->all());

        //redir
        return redirect()->route('panel.instalaciones.index')->with('status','Instalacion creada correctamente');    
    }

    public function edit($id_inst)
    {
        $instalacion = Instalacion::findOrFail($id_inst);
        return view('panel.instalaciones.edit', ['instalacion' => $instalacion]);
    }

    public function update(Request $request, $id_inst){
        //busqueda
        $instalacion = Instalacion::findOrFail($id_inst);
        //valid

        //actualizacion
        $instalacion->update($request->all());

        //redir
        return redirect()->route('panel.instalaciones.index')->with('status','Instalacion actualizada');
    } 

    public function destroy($id){
        //busq
        $instalacion = Instalacion::findOrFail($id);

        //elim
        $instalacion->delete();

        //redir
        return redirect()->route('panel.instalaciones.index')->with('status','Instalacion eliminada');
    }
}
