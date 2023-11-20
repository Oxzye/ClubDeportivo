<?php

namespace App\Http\Controllers;
use App\Models\Dias;
use Illuminate\Http\Request;
use App\Models\Instalacion;
use App\Models\Disponibilidades;
use App\Exports\DisponibilidadesExportExcel;
use Maatwebsite\Excel\Facades\Excel;
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
        $disp = Disponibilidades::all();
        return view('panel.Disponibilidades.create', compact('dias', 'instalaciones', 'disp'));
 
    }

    public function store (Request $request) {
        //valid
        $validated = $request->validate(
        [
            'horariodisp' => 'required|string',
        ],[
            'horariodisp.required' => 'El campo es obligatorio',
            'horariodisp.string' => 'Formato incorrecto, por favor ingrese horas, ejemplo: "HH:mm a HH:mm")',
        ]);
        if($validated) {
            $disp = new Disponibilidades();
            //Guardado de los datos
            $disp->id_dia = $request->get('id_dia');
            $disp->id_inst = $request->get('id_inst');
            $disp->horariodisp = $request->get('horariodisp');

        
            $disp ->save();
        };
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
        $disp = Disponibilidades::findOrFail($id_disp);
        //$paises = Paises::all();
        $validated = $request->validate(
            [
                'horariodisp' => 'required|string',
            ],[
                'horariodisp.required' => 'El campo es obligatorio',
                'horariodisp.string' => 'Formato incorrecto, por favor ingrese horas, ejemplo: "HH:mm a HH:mm")',
            ]);
            if($validated) {
                //Guardado de los datos
                $disp->id_dia = $request->get('id_dia');
                $disp->id_inst = $request->get('id_inst');
                $disp->horariodisp = $request->get('horariodisp');
            
                $disp ->save();
            };
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

    public function exportarDisponibilidadesExcel() {
        return Excel::download(new DisponibilidadesExportExcel, 'disponibilidades.xlsx');
    }
}
