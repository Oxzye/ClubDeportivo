<?php

namespace App\Http\Controllers;
use App\Models\Dias;
use Illuminate\Http\Request;
use App\Models\Instalacion;
use App\Models\Disponibilidades;

class DisponibilidadesController extends Controller
{
    public function index () {

        //$provincia = new Provincias;
        $dias = Dias::paginate(3);
        $instalacion = Instalacion::all();
        $disponibilidades = Disponibilidades::all();
        return view('panel.Disponibilidades.index', compact('dias', 'instalacion', 'disponibilidades'));
    }

    public function create () {
        $dias = Dias::all();
        $instalacion = Instalacion::all();
        $disponibilidades = Disponibilidades::all();
        return view('panel.Disponibilidades.create', compact('dias', 'instalacion', 'disponibilidades'));
 
    }

    public function store (Request $request) {
        //valid
        $disponibilidades = new Disponibilidades();
        //Guardado de los datos
        $disponibilidades->id_dia = $request->get('id_dia');
        $disponibilidades->id_inst = $request->get('id_inst');
        $disponibilidades->horariodisp = $request->get('horariodisp');

       
        $disponibilidades ->save();
        //Redir
        return redirect()->route('Disponibilidades.index')->with('status', 'Disponibilidad creado correctamente');
    }

    public function edit($id_disp) {
        $disponibilidades = Disponibilidades::findOrFail($id_disp);

        if ($disponibilidades) {
            $dias = Dias::all();
            return view('panel.Disponibilidades.edit', compact('dias', 'instalacion'));
        } else {
            return redirect()->route('Disponibilidades.index')->with('error', 'Disponibilidad no encontrada');
        }
    }

    public function update(Request $request, $id_disp){
        //$paises = Paises::all();
        $disponibilidades = Disponibilidades::findOrFail($id_disp);
        $disponibilidades->id_dia = $request->get('id_dia');
        $disponibilidades->id_inst = $request->get('id_inst');
        $disponibilidades->save();
        
        
        //redireccion
        return redirect()->route('Disponibilidades.index')->with('status', 'Disponibilidad Actualizada correctamente');
    }

    public function destroy($id_disp) {
        //busqueda
        $disponibilidades = Disponibilidades::findOrFail($id_disp);

        //elminacion
        $disponibilidades->delete();

        
        return redirect()->route('Disponibilidades.index')->with('status', 'Disponibilidad eliminada correctamente');
    }
}
