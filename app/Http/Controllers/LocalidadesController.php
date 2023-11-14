<?php

namespace App\Http\Controllers;

use App\Models\Localidades;
use Illuminate\Http\Request;
use App\Models\Provincias;
class LocalidadesController extends Controller
{
    public function index () {

        //$provincia = new Localidades;
        $localidad = Localidades::paginate(3);
        $provincia = Provincias::all();
        return view('panel.Localidades.index', compact('localidad', 'provincia'));
    }

    public function create () {
        $provincia = Provincias::all();
        $localidad = Localidades::all();
        return view('panel.Localidades.create', compact('localidad', 'provincia'));
 
    }

    public function store (Request $request) {
        //valid
        $localidad = new Localidades();
        //Guardado de los datos
        $localidad->id_prov = $request->get('id_prov');
        $localidad->nombre_loc = $request->get('nombre_loc');
        $localidad->cod_postal = $request->get('cod_postal');
       
        $localidad ->save();
        //Redir
        return redirect()->route('Localidades.index')->with('status', 'Localidad creada correctamente');
    }

    public function edit($id_loc) {
        
        $localidad = Localidades::findOrFail($id_loc);
        if ($localidad) {
            $provincia = Provincias::all();
            return view('panel.Localidades.edit', compact('localidad', 'provincia'));
        } else {
            return redirect()->route('panel.Localidades.index')->with('error', 'Localidad no encontrada');
        }
    }

    public function update(Request $request, $id){
        //$provincia = Paises::all();
        $localidad = Localidades::findOrFail($id);
        $localidad->nombre_loc = $request->input('nombre_loc');
        $localidad->id_loc = $request->input('id_loc');
        $localidad->cod_postal = $request->input('cod_postal');
        $localidad->save();
        
        
        //redireccion
        return redirect()->route('Localidades.index')->with('status', 'Localidad Actualizada correctamente');
    }

    public function destroy($id) {
        //busqueda
        $localidad = Localidades::findOrFail($id);

        //elminacion
        $localidad->delete();

        
        return redirect()->route('Localidades.index')->with('status', 'Localidad eliminada correctamente');
    }
}