<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paises;

class PaisesController extends Controller
{
    public function index () {

        $paises = Paises::all();

        return view('panel.paises.index', compact('paises'));
    }

    public function create () {
        return view('panel.paises.create');
    }

    public function store (Request $request) {
        //Validacion de los datos
        $validated = $request->validate(
            [
                'nombre_pais' => 'required|unique:paises|max:50',
            ],
            [
                'nombre_pais.required' => 'El nombre es obligatorio.',
                'nombre_pais.unique' => 'El nombre ya está registrado',
                'nombre_pais.string' => 'El nombre debe ser una cadena de texto.',
                'nombre_pais.max' => 'El nombre no debe tener más de 50 caracteres.',
            ]);
        // Guardado de los datos
        if ($validated) {
            Paises::create($request->all());
        };

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('paises.index')->with('status', 'País creado correctamente');
    }

    public function edit($id_pais) {
        $pais = Paises::findOrFail($id_pais);
        return view('panel.paises.edit', ['pais' => $pais]);
    }

    public function update(Request $request, $id_pais){
        //busqueda
        $pais = Paises::findOrFail($id_pais);
         //Validacion de los datos
         $validated = $request->validate(
            [
                'nombre_pais' => 'required|max:50|unique:paises,nombre_pais,' . $id_pais . ',id_pais'
            ],
            [
                'nombre_pais.required' => 'El nombre es obligatorio.',
                'nombre_pais.unique' => 'El nombre ya está registrado',
                'nombre_pais.string' => 'El nombre debe ser una cadena de texto.',
                'nombre_pais.max' => 'El nombre no debe tener más de 50 caracteres.',
            ]);
        // Guardado de los datos
        if ($validated) {        
            //actualizacion
            $pais->update($request->all());
        }
        //redireccion con un mensaje flash de sesión
        return redirect()->route('paises.index')->with('status', 'País Actualizado correctamente');
    }

    public function destroy($id) {
        //busqueda
        $pais = Paises::findOrFail($id);

        //elminacion
        $pais->delete();

        //redireccion
        return redirect()->route('paises.index')->with('status', 'País eliminado correctamente');
    }
    public function show($id){
        $pais = Paises::findOrFail($id);
        return view( 'paises.show', [ 'pais' => $pais ]);
    }
}

