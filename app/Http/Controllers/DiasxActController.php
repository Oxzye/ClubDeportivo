<?php

namespace App\Http\Controllers;
use App\Models\Dias;
use App\Models\Actividad;
use Illuminate\Http\Request;
use App\Models\DiasxAct;

class DiasxActController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dias = Dias::all();
        $actividades = Actividad::all();
        $diasxact = DiasxAct::paginate(4);
        return view('panel.DiasxAct.index', compact('dias', 'actividades', 'diasxact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dias = Dias::all();
        $actividades = Actividad::all();
        $diasxact = DiasxAct::all();
        return view('panel.DiasxAct.create', compact('dias', 'actividades', 'diasxact'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { //Validacion de los datos
        $validated = $request->validate(
        [
            'id_dia' =>  'required|integer|max:50',
            'id_act' =>  'required|integer|max:50',
            'horario_inicio' => 'required|datetime',
            'horario_fin' => 'required|datetime',
        ],[
            'id_dia.required' => 'El campo es obligatorio',
            'id_dia.integer' => 'Ingrese un valor numerico',
            'id_dia.max' => 'Solo se permiten hasta 50 caracteres',
            
            'id_act.required' => 'El campo es obligatorio',
            'id_act.integer' => 'Ingrese un valor numerico',
            'id_act.max' => 'Solo se permiten hasta 50 caracteres',
            'horario_inicio.required' => 'El campo es obligatorio',
            'horario_inicio.datetime' => 'Formato incorrecto, por favor ingrese una hora valida, (ejemplo: 23:45 o 17:30)',
            'horario_fin.required' => 'El campo es obligatorio',
            'horario_fin.datetime' => 'Formato incorrecto, por favor ingrese una hora valida, (ejemplo: 23:45 o 17:30)',
        ]);
        if($validated) {
            DiasxAct::create($request->all());
        };
        //Redireccion con un mensaje flash de sesion
        return redirect()->route('DiasxAct.index')->with('status', 'Dia por Actividad creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_diasxact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_diasxact)
    {
        $diasxact=DiasxAct::findOrFail($id_diasxact);

        if($diasxact) {
            $dias = Dias::all();
            $actividades = Actividad::all();
            return view("panel.DiasxAct.edit", compact("dias","actividades"));
        } else {
            return redirect()->route('DiasxAct.index')->with('error','Día por actividad no encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_diasxact)
    {
        $diasxact=DiasxAct::findOrFail($id_diasxact);
         //Validacion de los datos
         $validated = $request->validate(
            [
                'dia_id' =>  'required|integer|max:50',
                'id_act' =>  'required|integer|max:50',
                'horario_inicio' => 'required|datetime',
                'horario_fin' => 'required|datetime',
            ],[
                'dia_id.required' => 'El campo es obligatorio',
                'dia_id.integer' => 'Ingrese un valor numerico',
                'dia_id.max' => 'Solo se permiten hasta 50 caracteres',
                
                'id_act.required' => 'El campo es obligatorio',
                'id_act.integer' => 'Ingrese un valor numerico',
                'id_act.max' => 'Solo se permiten hasta 50 caracteres',
                'horario_inicio.required' => 'El campo es obligatorio',
                'horario_inicio.datetime' => 'Formato incorrecto, por favor ingrese una hora valida, (ejemplo: 23:45 o 17:30)',
                'horario_fin.required' => 'El campo es obligatorio',
                'horario_fin.datetime' => 'Formato incorrecto, por favor ingrese una hora valida, (ejemplo: 23:45 o 17:30)',
            ]);
            if($validated) {
                $diasxact->update($request->all());
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
        $diasxact = DiasxAct::findOrFail($id_diasxact);
        // eliminación
        $diasxact->delete();
        //eliminar el registro del dia y acta que coincidan en la tabla diasxact
        return redirect()->route('DiasxAct.index')->with('status', 'Dia por Actividad eliminado correctamente');
    }
}
