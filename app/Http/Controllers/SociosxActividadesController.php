<?php

namespace App\Http\Controllers;
use App\Models\Actividad;
use App\Models\SociosxActividad;
use App\Models\Socio;
use Illuminate\Http\Request;
use App\Exports\SocxActExportExcel;
use Maatwebsite\Excel\Facades\Excel;

class SociosxActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actividades = Actividad::all();
        $socios = Socio::all();
        $socxact = SociosxActividad::with('actividad')->get();
        $socxact = SociosxActividad::with('socio')->get();
        $socxact = SociosxActividad::paginate(4);
        return view('panel.SocxAct.index', compact('socios', 'actividades', 'socxact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $actividades = Actividad::all();
        $socios = Socio::all();
        $sxa = SociosxActividad::all();
        return view('panel.SocxAct.create', compact('socios', 'actividades', 'sxa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'fecha_inscripcion' => 'required',
                'opinion_soc' => 'nullable|string|max:250',
            ],[
                'fecha_inscripcion.required' => 'El campo es obligatorio',

                'opinion_soc.nullable' => 'El campo puede ser null',
                'opinion_soc.string' => 'string',
                'opinion_soc.max' => 'Solo se permiten hasta 250 caracteres',
            ]);
            if($validated) {
                $sxa = new SociosxActividad();
                $sxa->id_act = $request->input('id_act');
                $sxa->id_soc = $request->input('id_soc');
                $sxa->fecha_inscripcion = $request->input('fecha_inscripcion');
                $sxa->opinion_soc = $request->input('opinion_soc');
                
                $sxa->save();
                // SociosxActividad::create($request->all());
            };
            //Redireccion con un mensaje flash de sesion
            return redirect()->route('SocxAct.index')->with('status', 'Socio por Actividad creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_sxa)
    {
        $sxa = SociosxActividad::findOrFail($id_sxa);
        return view('panel.SocxAct.show', ['sxa' => $sxa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_sxa)
    {
        $sxa = SociosxActividad::findOrFail($id_sxa);

        if($sxa){
            $actividades = Actividad::all();
            $socios = Socio::all();
            return view('panel.SocxAct.edit', compact('socios', 'actividades', 'sxa'));
        } else {
            return redirect()->route('SocxAct.index')->with('error', 'Socio por Actividad no encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_sxa)
    {
        $sxa = SociosxActividad::findOrFail($id_sxa);
        //validacion
        $validated = $request->validate(
            [
                'fecha_inscripcion' => 'required',
                'opinion_soc' => 'nullable|string|max:250',
            ],[
                'fecha_inscripcion.required' => 'El campo es obligatorio',

                'opinion_soc.nullable' => 'El campo puede ser null',
                'opinion_soc.string' => 'string',
                'opinion_soc.max' => 'Solo se permiten hasta 250 caracteres',
            ]);
            if($validated) {
                $sxa->id_act = $request->input('id_act');
                $sxa->id_soc = $request->input('id_soc');
                $sxa->fecha_inscripcion = $request->input('fecha_inscripcion');
                $sxa->opinion_soc = $request->input('opinion_soc');
                
                $sxa->save();
                // $sxa->update($request->all());
            };
            //Redireccion con un mensaje flash de sesion
            return redirect()->route('SocxAct.index')->with('status', 'Socio por Actividad actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_sxa)
    {
        //busqueda
        $sxa = SociosxActividad::findOrFail($id_sxa);
        // eliminación
        $sxa->delete();

        return redirect()->route('SocxAct.index')->with('status', 'Socio por Actividad eliminado correctamente');
    }

        public function exportarSocxActExcel() {
        return Excel::download(new SocxActExportExcel, 'socxact.xlsx');
    }
}
