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
        $deportes = Deporte::all();
        $instalaciones = Instalacion::all();
        $actividades =Actividad::with('instalacion')->get();
        $actividades =Actividad::with('deporte')->get();
        $actividades = Actividad::paginate(4);
        return view('panel.Actividades.index', compact('deportes', 'instalaciones', 'actividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $deportes = Deporte::all();
        $instalaciones = Instalacion::all();
        return view('panel.Actividades.create', compact('deportes', 'instalaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                // 'id_dep' => 'required|exists:deportes, nombreDep,' . $id_dep .',id_dep',
                // 'id_inst' => 'required|exists:instalaciones, nombre_inst,'. $id_inst .'id_inst',
                'nombre_act' => 'required|string|max:100',
                'limite_soc_atc' => 'required|integer|max:60',
                'descripcion_act' => 'required|string|max:200',
                'actividad_en_curso' => 'required|boolean',
                'fecha_inicio_act' => 'required|date',
                'fecha_fin_act' => 'nullable|date',
            ],[
                // 'id_dep.required' => 'El campo deporte es obligatorio',
                // 'id_dep.exists' => 'El deporte seleccionado no es válido',

                // 'id_inst.required' => 'El campo instalación es obligatorio',
                // 'id_inst.exists' => 'La instalación seleccionada no es válida',
                
                'nombre_act.required' => 'El campo nombre de la actividad es obligatorio',
                'nombre_act.string' => 'Ingrese texto',
                'nombre_act.max' => 'Solo se permiten hasta 0 caracteres',

                'limite_soc_atc.required' => 'El campo limite de socios por actividada es obligatorio',
                'limite_soc_atc.integer' => 'Ingrese un valor numerico',
                'limite_soc_atc.max' => 'Solo se permiten hasta 50 caracteres',

                'descripcion_act.required' => 'El campo descripción de actividad es obligatorio',
                'descripcion_act.string' => 'Ingrese texto',
                'descripcion_act.max' => 'Solo se permiten hasta 200 caracteres',

                'actividad_en_curso.required' => 'El campo actividad en curso es obligatorio',
                'actividad_en_curso.string' => 'Ingrese 0 (falso) o 1 (verdadero)',

                'fecha_inicio_act.required' => 'El campo fecha de inicio de actividad es obligatorio',
                'fecha_inicio_act.string' => 'Ingrese formato de fecha (YYYY-MM-DD)',
                
                'fecha_fin_act.string' => 'Ingrese formato de fecha (YYYY-MM-DD)',
            ]);
            if($validated) {
                //Guardado de los datos
                Actividad::create($request->all());
            }
        // redir
        return redirect()->route('Actividades.index')->with('status', 'Actividad creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_act)
    {
        $act = Actividad::findOrFail($id_act);
        return view('panel.actividades.show', ['act' => $act]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_act, $id_dep, $id_inst)
    {
        $act = Actividad::findOrFail($id_act);

        if($act) {
            //Recupera el deporte y la instalación que deseas editar
            // $deportes = Deporte::all();
            $deporte = Deporte::with('deportes')->find($id_dep);
            $instalacion = Deporte::with('instalaciones')->find($id_inst);
            // $instalaciones = Instalacion::all();
            return view('panel.Actividades.edit', compact('deporte', 'instalacion', 'act'));
        } else {
            return redirect()->route('Actividades.index')->with('error', 'Actividad no encontrada');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_act, $id_dep, $id_inst)
    {
        $act = Actividad::findOrFail($id_act);
        // Agregando recuperación de deporte e instalación
        $deporte = Deporte::with('deportes')->find($id_dep);
        $instalacion = Deporte::with('instalaciones')->find($id_inst);
        // Validar los datos del formulario de edición
        $validated = $request->validate(
            [
                'id_dep' => 'required|unique:deportes,nombreDep,'.$id_dep.'id_dep',
                'id_inst' => 'required|unique:instalaciones,nombre_inst,'.$id_inst.'id_inst',
                'nombre_act' => 'required|string|max:100',
                'limite_soc_atc' => 'required|integer|max:60',
                'descripcion_act' => 'required|string|max:200',
                'actividad_en_curso' => 'required|boolean',
                'fecha_inicio_act' => 'required|date',
                'fecha_fin_act' => 'nullable|date',
            ],[
                'id_dep.required' => 'El campo deporte es obligatorio',
                'id_dep.integer' => 'Ingrese un valor numerico',
                'id_dep.max' => 'Solo se permiten hasta 50 caracteres',

                'id_inst.required' => 'El campo instalación es obligatorio',
                'id_inst.integer' => 'Ingrese un valor numerico',
                'id_inst.max' => 'Solo se permiten hasta 50 caracteres',
                
                'nombre_act.required' => 'El campo nombre de la actividad es obligatorio',
                'nombre_act.string' => 'Ingrese texto',
                'nombre_act.max' => 'Solo se permiten hasta 0 caracteres',

                'limite_soc_atc.required' => 'El campo limite de socios por actividada es obligatorio',
                'limite_soc_atc.integer' => 'Ingrese un valor numerico',
                'limite_soc_atc.max' => 'Solo se permiten hasta 50 caracteres',

                'descripcion_act.required' => 'El campo descripción de actividad es obligatorio',
                'descripcion_act.string' => 'Ingrese texto',
                'descripcion_act.max' => 'Solo se permiten hasta 200 caracteres',

                'actividad_en_curso.required' => 'El campo actividad en curso es obligatorio',
                'actividad_en_curso.string' => 'Ingrese 0 (falso) o 1 (verdadero)',

                'fecha_inicio_act.required' => 'El campo fecha de inicio de actividad es obligatorio',
                'fecha_inicio_act.string' => 'Ingrese formato de fecha (YYYY-MM-DD)',
                
                'fecha_fin_act.string' => 'Ingrese formato de fecha (YYYY-MM-DD)',
            ]);
            if($validated) {
                //Guardado de los datos
                $act->update($request->all());
            }

        // redir
        return redirect()->route('Actividades.index')->with('status', 'Actividad actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_act)
    {
        //busqueda
        $act = Actividad::findOrFail($id_act);
        //eliminación
        $act->delete();
        //redirección
        return redirect()->route('Actividades.index')->with('status', 'Actividad eliminada correctamente');
    }
}
