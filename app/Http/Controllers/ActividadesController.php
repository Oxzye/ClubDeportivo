<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instalacion;
use App\Models\Deporte;
use App\Models\Actividad;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ActividadesExportExcel;
use Maatwebsite\Excel\Facades\Excel;
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
        $actividades = Actividad::all();
        return view('panel.Actividades.index', compact('deportes', 'instalaciones', 'actividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $deportes = Deporte::all();
        $instalaciones = Instalacion::all();
        $act = Actividad::all();
        return view('panel.Actividades.create', compact('deportes', 'instalaciones', 'act'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->input('id_dep'));
        $validated = $request->validate(
            [
                'nombre_act' => 'required|string|unique:actividades|max:60',
                'limite_soc_atc' => 'required|integer',
                'descripcion_act' => 'required|string|max:200',
                'actividad_en_curso' => 'required|boolean',
                'fecha_inicio_act' => 'required|date',
                'fecha_fin_act' => 'required|date|after_or_equal:fecha_inicio_act',
            ],[
                'nombre_act.required' => 'El campo nombre de la actividad es obligatorio',
                'nombre_act.string' => 'Ingrese texto',
                'nombre_act.unique' => 'El nombre ya está registrado',
                'nombre_act.max' => 'Solo se permiten hasta 60 caracteres',

                'limite_soc_atc.required' => 'El campo limite de socios por actividada es obligatorio',
                'limite_soc_atc.integer' => 'Ingrese un valor numerico',

                'descripcion_act.required' => 'El campo descripción de actividad es obligatorio',
                'descripcion_act.string' => 'Ingrese texto',
                'descripcion_act.max' => 'Solo se permiten hasta 200 caracteres',

                'actividad_en_curso.required' => 'El campo actividad en curso es obligatorio',
                'actividad_en_curso.string' => 'Ingrese 0 (falso) o 1 (verdadero)',

                'fecha_inicio_act.required' => 'El campo fecha de inicio de actividad es obligatorio',
                'fecha_inicio_act.string' => 'Ingrese formato de fecha (YYYY-MM-DD)',
                
                'fecha_fin_act.required' => 'El campo fecha de fin de actividad es obligatorio',
                'fecha_fin_act.string' => 'Ingrese formato de fecha (YYYY-MM-DD)',
            ]);
            if($validated) {
                //Guardado de los datos
                $act = new Actividad();
                $act->id_dep = $request->input('id_dep');
                $act->id_inst = $request->input('id_inst');
                $act->nombre_act = $request->input('nombre_act');
                $act->limite_soc_atc = $request->input('limite_soc_atc');
                $act->descripcion_act = $request->input('descripcion_act');
                $act->actividad_en_curso = $request->input('actividad_en_curso');
                $act->fecha_inicio_act = $request->input('fecha_inicio_act');
                $act->fecha_fin_act = $request->input('fecha_fin_act');                

                $act->save();
               
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
    public function edit($id_act)
    {
        $act = Actividad::findOrFail($id_act);

        if($act) {
            //Recupera el deporte y la instalación que deseas editar
            $deportes = Deporte::all();
           
            $instalaciones = Instalacion::all();
            return view('panel.Actividades.edit', compact('deportes', 'instalaciones', 'act'));
        } else {
            return redirect()->route('Actividades.index')->with('error', 'Actividad no encontrada');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_act)
    {
        $act = Actividad::findOrFail($id_act);
        // $deporte = Deporte::with('deportes')->find($id_dep);
        // $instalacion = Deporte::with('instalaciones')->find($id_inst);
                // dd($request->input('id_dep'));
        // Validar los datos del formulario de edición
        $validated = $request->validate(
            [
                'nombre_act' => 'required|string|unique:actividades,nombre_act, '. $id_act.',id_act|max:100',
                'limite_soc_atc' => 'required|integer',
                'descripcion_act' => 'required|string|max:200',
                'actividad_en_curso' => 'required|boolean',
                'fecha_inicio_act' => 'required|date',
                'fecha_fin_act' => 'required|date',
            ],[
                'nombre_act.required' => 'El campo nombre de la actividad es obligatorio',
                'nombre_act.string' => 'Ingrese texto',
                'nombre_act.unique' => 'El nombre ya está registrado',
                'nombre_act.max' => 'Solo se permiten hasta 60 caracteres',

                'limite_soc_atc.required' => 'El campo limite de socios por actividada es obligatorio',
                'limite_soc_atc.integer' => 'Ingrese un valor numerico',

                'descripcion_act.required' => 'El campo descripción de actividad es obligatorio',
                'descripcion_act.string' => 'Ingrese texto',
                'descripcion_act.max' => 'Solo se permiten hasta 200 caracteres',

                'actividad_en_curso.required' => 'El campo actividad en curso es obligatorio',
                'actividad_en_curso.string' => 'Ingrese 0 (falso) o 1 (verdadero)',

                'fecha_inicio_act.required' => 'El campo fecha de inicio de actividad es obligatorio',
                'fecha_inicio_act.string' => 'Ingrese formato de fecha (YYYY-MM-DD)',
                
                'fecha_fin_act.required' => 'El campo fecha de fin de actividad es obligatorio',
                'fecha_fin_act.string' => 'Ingrese formato de fecha (YYYY-MM-DD)',
            ]);
            if($validated) {
                //Guardado de los datos
                $act->id_dep = $request->input('id_dep');
                $act->id_inst = $request->input('id_inst');
                $act->nombre_act = $request->input('nombre_act');
                $act->limite_soc_atc = $request->input('limite_soc_atc');
                $act->descripcion_act = $request->input('descripcion_act');
                $act->actividad_en_curso = $request->input('actividad_en_curso');
                $act->fecha_inicio_act = $request->input('fecha_inicio_act');
                $act->fecha_fin_act = $request->input('fecha_fin_act');                

                $act->save();
                // $act->update($request->all());
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

    public function exportarActividadesExcel() {
        return Excel::download(new ActividadesExportExcel, 'actividades.xlsx');
    }

    public function exportarActividadesPDF() {
        set_time_limit(6000);
        // $admin_id = auth()->user()->id;
            // Traemos las actividades con relaciones a instalaciones y deportes
        // $actividades = Actividad::with('instalacion', 'deporte')
        //     ->where('id_act',auth()->user()->id)->get();

            $actividades = Actividad::all();
        // capturamos la vista y los datos que enviaremos a la misma
        $pdf = Pdf::loadView('panel.Actividades.pdf_actividades', compact('actividades'));
        //Renderizamos la vista
        $pdf->render();
        // Visualizaremos el PDF en el navegador
        return $pdf->stream('actividades.pdf');
        }
}
