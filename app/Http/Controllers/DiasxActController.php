<?php

namespace App\Http\Controllers;

use App\Exports\DiasxActExportExcel;
use App\Models\Dias;
use App\Models\Actividad;
use Illuminate\Http\Request;
use App\Models\DiasxAct;
use App\Exports\EmpxActExportExcel;
use Maatwebsite\Excel\Facades\Excel;

class DiasxActController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dias = Dias::all();
        $actividades = Actividad::all();
        $diasxact = DiasxAct::with('dia')->get();
        $diasxact = DiasxAct::with('actividad')->get();
        $diasxact = DiasxAct::all();
        return view('panel.DiasxAct.index', compact('dias', 'actividades', 'diasxact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dias = Dias::all();
        $actividades = Actividad::all();
        $dxact =DiasxAct::all();
        return view('panel.DiasxAct.create', compact('dias', 'actividades', 'dxact'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { //Validacion de los datos
        $validated = $request->validate(
        [
            'horario_inicio' => 'required',
            'horario_fin' => 'required',
        ],[
            'horario_inicio.required' => 'El campo es obligatorio',
            'horario_inicio.time' => 'Formato incorrecto, por favor ingrese una hora valida, (ejemplo: 23:45 o 17:30)',
            
            'horario_fin.required' => 'El campo es obligatorio',
            'horario_fin.time' => 'Formato incorrecto, por favor ingrese una hora valida, (ejemplo: 23:45 o 17:30)',
        ]);
        if($validated) {
            $dxact = new DiasxAct();
            $dxact->id_dia = $request->input('id_dia');
            $dxact->id_act = $request->input('id_act');
            $dxact->horario_inicio = $request->input('horario_inicio');
            $dxact->horario_fin = $request->input('horario_fin');  
            
            $dxact->save();
            // DiasxAct::create($request->all());
        };
        //Redireccion con un mensaje flash de sesion
        return redirect()->route('DiasxAct.index')->with('status', 'Dia por Actividad creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_diasxact)
    {
        $dxact=DiasxAct::findOrFail($id_diasxact);
        return view("panel.DiasxAct.show", ['dxact'=> $dxact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_diasxact)
    {
        $dxact=DiasxAct::findOrFail($id_diasxact);

        if($dxact) {
            $dias = Dias::all();
            $actividades = Actividad::all();
            return view("panel.DiasxAct.edit", compact('dias','actividades', 'dxact'));
        } else {
            return redirect()->route('DiasxAct.index')->with('error','Día por actividad no encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_diasxact)
    {
        $dxact=DiasxAct::findOrFail($id_diasxact);
         //Validacion de los datos
         $validated = $request->validate(
            [
                'horario_inicio' => 'required|date',
                'horario_fin' => 'required|date',
            ],[
                'horario_inicio.required' => 'El campo es obligatorio',
                'horario_inicio.date' => 'Formato incorrecto, por favor ingrese una hora valida, (ejemplo: 23:45 o 17:30)',

                'horario_fin.required' => 'El campo es obligatorio',
                'horario_fin.date' => 'Formato incorrecto, por favor ingrese una hora valida, (ejemplo: 23:45 o 17:30)',
            ]);
            if($validated) {
                $dxact->id_dia = $request->input('id_dia');
                $dxact->id_act = $request->input('id_act');
                $dxact->horario_inicio = $request->input('horario_inicio');
                $dxact->horario_fin = $request->input('horario_fin');  
                
                $dxact->save();
            };
            //Redireccion con un mensaje flash de sesion
            return redirect()->route('DiasxAct.index')->with('status', 'Dia por Actividad actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_diasxact)
    {
        //busqueda
        $dxact = DiasxAct::findOrFail($id_diasxact);
        // eliminación
        $dxact->delete();
        //eliminar el registro del dia y acta que coincidan en la tabla diasxact
        return redirect()->route('DiasxAct.index')->with('status', 'Dia por Actividad eliminado correctamente');
    }

    public function exportarDiasxActExcel() {
        return Excel::download(new DiasxActExportExcel, 'diasxact.xlsx');
    }
}
