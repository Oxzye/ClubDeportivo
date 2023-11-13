<?php

namespace App\Http\Controllers;

use App\Models\Provincias;
use Illuminate\Http\Request;
use App\Models\Paises;

class ProvinciasController extends Controller
{
    public function index () {

        //$provincia = new Provincias;
        $provincia = Provincias::paginate(3);
        $paises = Paises::all();
        return view('panel.Provincias.index', compact('provincia', 'paises'));
    }

    public function create () {
        $paises = Paises::paginate(3);
        $provincia = Provincias::all();
        return view('panel.Provincias.create', compact('provincia', 'paises'));
 
    }

    public function store (Request $request) {
        //valid
        $provincia = new Provincias();
        //Guardado de los datos
        $provincia->id_pais = $request->get('id_pais');
        $provincia->nombre_prov = $request->get('nombre_prov');
       
        $provincia ->save();
        //Redir
        return redirect()->route('Provincias.index')->with('status', 'Provincia creado correctamente');
    }

    public function edit($id_prov) {
        $provincia = Provincias::findOrFail($id_prov);

        if ($provincia) {
            $paises = Paises::all();
            return view('panel.Provincias.edit', compact('provincia', 'paises'));
        } else {
            return redirect()->route('Provincias.index')->with('error', 'Provincia no encontrada');
        }
    }

    public function update(Request $request, $id){
        //$paises = Paises::all();
        $provincia = Provincias::findOrFail($id);
        $provincia->nombre_prov = $request->input('nombre_prov');
        $provincia->id_pais = $request->input('id_pais');
        $provincia->save();
        
        
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
