<?php

namespace App\Http\Controllers;
use App\Models\Cargos;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    public function index () {

        $cargos = Cargos::all();
        return view('cargos.index', compact('cargos'));
    }

    public function create() {
        return view('cargos.create');
    }

    public function store(Request $request) {
        //valid

        //Guardado de los datos
        Cargos::create($request->all());

        //Redir
        return redirect()->route('cargos.index')->with('status', 'Cargo creado correctamente');
    }

    public function edit($id_cargo) {
        $cargos = Cargos::findOrFail($id_cargo);
        return view('cargos.edit', ['cargo' => $cargos]);
    }

    public function update(Request $request, $id_cargo){
        //busqueda
        $cargos = Cargos::findOrFail($id_cargo);
        //valid

        //actualizacion
        $cargos->update($request->all());

        //redireccion
        return redirect()->route('cargos.index')->with('status', 'Cargo Actualizado correctamente');
    }

    public function destroy($id_cargo) {
        //busqueda
        $cargo = Cargos::findOrFail($id_cargo);

        //elminacion
        $cargo->delete();

        //redireccion
        return redirect()->route('cargos.index')->with('status', 'eliminado correctamente');
    }
}

