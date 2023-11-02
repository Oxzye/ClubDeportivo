<?php

namespace App\Http\Controllers;

use App\Models\Provincias;
use Illuminate\Http\Request;
use App\Models\Paises;
class ProvinciasController extends Controller
{
    public function index () {

        //$provincia = new Provincias;
        $provincia = Provincias::all();
        $paises = Paises::all();
        return view('panel.Provincias.index', compact('provincia', 'paises'));
    }

    public function create () {
        $paises = Paises::all();
        $provincia = Paises::all();
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
        return view('panel.Provincias.edit', ['provincia' => $provincia]);
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
