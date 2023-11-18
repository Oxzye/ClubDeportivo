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
        $dias = Dias::all();
        $instalaciones = Instalacion::all();
        $disponibilidades = Disponibilidades::with('dia')->get();
        $disponibilidades = Disponibilidades::with('instalacion')->get();
        $disponibilidades = Disponibilidades::paginate(4);
        return view('panel.Disponibilidades.index', compact('dias', 'instalaciones', 'disponibilidades'));
    }

    public function create () {
        $dias = Dias::all();
        $instalaciones = Instalacion::all();
        $disponibilidades = Disponibilidades::all();
        return view('panel.Disponibilidades.index', compact('dias', 'instalaciones', 'disponibilidades'));
 
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
        $disp = Disponibilidades::findOrFail($id_disp);

        if ($disp) {
            $dias = Dias::all();
            $instalaciones = Instalacion::all();
            return view('panel.Disponibilidades.edit', compact('dias', 'instalaciones','disp'));
        } else {
            return redirect()->route('Disponibilidades.index')->with('error', 'Disponibilidad no encontrada');
        }
    }

    public function update(Request $request, $id_disp){
        //$paises = Paises::all();
        $disp = Disponibilidades::findOrFail($id_disp);
        $disp->id_dia = $request->get('id_dia');
        $disp->id_inst = $request->get('id_inst');
        $disp->save();
        
        
        //redireccion
        return redirect()->route('Disponibilidades.index')->with('status', 'Disponibilidad Actualizada correctamente');
    }

    public function destroy($id_disp) {
        //busqueda
        $disp = Disponibilidades::findOrFail($id_disp);

        //elminacion
        $disp->delete();

        
        return redirect()->route('Disponibilidades.index')->with('status', 'Disponibilidad eliminada correctamente');
    }

    public function show(string $id_disp)
    {
        $disp = Disponibilidades::findOrFail($id_disp);
        return view('panel.Disponibilidades.show', ['disp' => $disp]);
    }
}
