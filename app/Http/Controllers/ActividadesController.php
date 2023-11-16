<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instalacion;
use App\Models\Deporte;
use App\Models\Actividad;
use App\Models\DiasxAct;
// use App\Models\SociosxActividad;
// use App\Models\Detalles_Factura;
use App\Models\EmpleadosxActividad;
class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diasxact = DiasxAct::all();
        $deportes = Deporte::all();
        $instalaciones = Instalacion::all();
        $exa = EmpleadosxActividad::all();
        $actividades = Actividad::all();
        return view('panel.Actividades.index', compact('diasxact', 'deportes', 'instalaciones','exa', 'actividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $diasxact = DiasxAct::all();
        $deportes = Deporte::all();
        $instalaciones = Instalacion::all();
        $exa = EmpleadosxActividad::all();
        $actividades = Actividad::all();
        return view('panel.Actividades.create', compact('diasxact', 'deportes', 'instalaciones','exa', 'actividades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $actividades = new Actividad();
        //Guardado de los datos
        $actividades->id_diasxact = $request->get('id_diasxact');
        $actividades->id_dep = $request->get('id_dep');
        $actividades->id_inst = $request->get('id_inst');
        $actividades->id_exa = $request->get('id_exa');
        $actividades->nombre_act = $request->get('nombre_act');
        $actividades->limite_soc_atc = $request->get('limite_soc_atc');
        $actividades->descripcion_act = $request->get('descripcion_act');
        $actividades->actividad_en_curso = $request->get('actividad_en_curso');
        $actividades->fecha_inicio_act = $request->get('fecha_inicio_act');
        $actividades->fecha_fin_act = $request->get('fecha_fin_act');

        $actividades->save();
        // redir
        return redirect()->route('Actividades.index')->with('status', 'Actividad creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_act)
    {
        $actividades = Actividad::findOrFail($id_act);

        if($actividades) {
            $diasxact = DiasxAct::all();
            $deportes = Deporte::all();
            $instalaciones = Instalacion::all();
            $exa = EmpleadosxActividad::all();
            return view('panel.Actividades.edit', compact('diasxact', 'deportes', 'instalaciones','exa'));
        } else {
            return redirect()->route('Actividades.index')->with('error', 'Actividad no encontrada');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_act)
    {
        $actividades = Actividad::findOrFail($id_act);
        $actividades->id_diasxact = $request->get('id_diasxact');
        $actividades->id_dep = $request->get('id_dep');
        $actividades->id_inst = $request->get('id_inst');
        $actividades->id_exa = $request->get('id_exa');
        $actividades->nombre_act = $request->get('nombre_act');
        $actividades->limite_soc_atc = $request->get('limite_soc_atc');
        $actividades->descripcion_act = $request->get('descripcion_act');
        $actividades->actividad_en_curso = $request->get('actividad_en_curso');
        $actividades->fecha_inicio_act = $request->get('fecha_inicio_act');
        $actividades->fecha_fin_act = $request->get('fecha_fin_act');

        $actividades->save();
        // redir
        return redirect()->route('Actividades.index')->with('status', 'Actividad actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_act)
    {
        //busqueda
        $actividades = Actividad::findOrFail($id_act);
        //eliminación
        $actividades->delete();
        //redirección
        return redirect()->route('Actividades.index')->with('status', 'Actividad eliminada correctamente');
    }
}
