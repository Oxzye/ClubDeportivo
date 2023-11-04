<?php

namespace App\Http\Controllers;
use App\Models\Cargos;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    public function index () {

        $cargos = Cargos::paginate(3);
        return view('panel.cargos.index', compact('cargos'));

    }

    public function create() {
        return view('panel.cargos.create');
    }

    public function store(Request $request) {
        //valid

        //Guardado de los datos
        Cargos::create($request->all());

        //Validacion de los Datos
        $validated=$request->validate(
            [
                "nombre_cargo"=>"required|string|max:20",
                "descripcioncargo"=>"nullable|string|max:255",
                "salario_base"=>"required|numeric|min:0.01",
                "horas_de_trabajoxmes"=>"required|numeric|min:1",
                "horario_de_trabajo"=>"required|string|max:255",
            ]);
        //Guardado de los datos
        Cargos::create($request->all());

        //Redireccionar
        return redirect()->route('cargos.index')->with('status', 'Cargo creado correctamente');
    }
    public function show($id)
    {
        $cargos=Cargos::findOrFail($id);
        return view('cargos.show',['cargo'=> $cargos]);
    }
    public function edit($id_cargo) {
        $cargos = Cargos::findOrFail($id_cargo);
        return view('panel.cargos.edit', ['cargo' => $cargos]);
    }

    public function update(Request $request, $id_cargo){
        //busqueda
        $cargos = Cargos::findOrFail($id_cargo);
        //validacion y Guardado de los datos
        $validated=$request->validate(
            [
                "nombre_cargo"=>"required|string|max:20",
                "descripcioncargo"=>"nullable|string|max:255",
                "salario_base"=>"required|numeric|min:0.01",
                "horas_de_trabajoxmes"=>"required|numeric|min:1",
                "horario_de_trabajo"=>"required|string|max:255",
            ]);

        //actualizacion
        $cargos->update($request->all());

        //redireccion
        return redirect()->route('cargos.index')->with('status', 'Cargo Actualizado correctamente');
    }

    public function destroy($id_cargo) {
        //busqueda
        $cargos = Cargos::findOrFail($id_cargo);

        //elminacion
        $cargos->delete();

        //redireccion
        return redirect()->route('cargos.index')->with('status', 'eliminado correctamente');
    }

   
}

