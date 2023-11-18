<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\EmpleadosxActividad;
use App\Models\Empleado;
class EmpleadosxActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actividades = Actividad::all();
        $empleados = Empleado::all();
        $empxactiv = EmpleadosxActividad::with('actividad')->get();
        $empxactiv = EmpleadosxActividad::with('empleado')->get();
        $empxactiv = EmpleadosxActividad::paginate(4);
        return view('panel.EmpxAct.index', compact('empleados', 'actividades', 'empxactiv'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $actividades = Actividad::all();
        $empleados = Empleado::all();
        $empxact = EmpleadosxActividad::all();
        return view('panel.EmpxAct.create', compact('empleados', 'actividades','empxact'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   //Validacion de los datos
        // $empxact = new EmpleadosxActividad();
        // $empxact->id_act = $request->input('id_act');
        // $empxact->id_emp = $request->input('id_emp');
        
        // $empxact->save();
        $validated = $request->validate(
            [
                'id_act' => 'required|integer|max:50',
                'id_emp' => 'required|integer|max:50',
            ],[
                'id_act.required' => 'El campo es obligatorio',
                'id_act.integer' => 'Ingrese un valor numerico',
                'id_act.max' => 'Solo se permiten hasta 50 caracteres',

                'id_emp.required' => 'El campo es obligatorio',
                'id_emp.integer' => 'Ingrese un valor numerico',
                'id_emp.max' => 'Solo se permiten hasta 50 caracteres',
            ]);
            if($validated) {
                EmpleadosxActividad::create($request->all());
            };
            //Redireccion con un mensaje flash de sesion
            return redirect()->route('EmpxAct.index')->with('status', 'Empleado por Actividad creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_exa)
    {
        $empxact = EmpleadosxActividad::findOrFail($id_exa);
        return view('panel.EmpxAct.show', ['empxact' => $empxact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_exa)
    {
        $empxact=EmpleadosxActividad::findOrFail($id_exa);

        if($empxact){
            $actividades = Actividad::all();
            $empleados = Empleado::all();
            return view('panel.EmpxAct.edit', compact('empleados', 'actividades', 'empxact'));
        } else {
            return redirect()->route('EmpxAct.index')->with('error', 'Empleado por Actividad no encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_exa)
    {
        $empxact = EmpleadosxActividad::findOrFail($id_exa);

        $empxact->id_act = $request->input('id_act');
        $empxact->id_emp = $request->input('id_emp');
        
        $empxact->save();
        //validacion
        // $validated = $request->validate(
        //     [
        //         'id_act' => 'required|integer|max:50',
        //         'id_emp' => 'required|integer|max:50',
        //         'fecha_inscripcion' => 'required',
        //         'opinion_soc' => 'nullable|string|max:250',
        //     ],[
        //         'id_act.required' => 'El campo es obligatorio',
        //         'id_act.integer' => 'Ingrese un valor numerico',
        //         'id_act.max' => 'Solo se permiten hasta 50 caracteres',

        //         'id_emp.required' => 'El campo es obligatorio',
        //         'id_emp.integer' => 'Ingrese un valor numerico',
        //         'id_emp.max' => 'Solo se permiten hasta 50 caracteres'
        //     ]);
        //     if($validated) {
        //         $empxact->update($request->all());
        //     };
            //Redireccion con un mensaje flash de sesion
            return redirect()->route('EmpxAct.index')->with('status', 'Empleado por Actividad actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_exa)
    {
        //busqueda
        $empxact = EmpleadosxActividad::findOrFail($id_exa);
        // eliminación
        $empxact->delete();

        return redirect()->route('EmpxAct.index')->with('status', 'Empleado por Actividad eliminado correctamente');
    }
}
