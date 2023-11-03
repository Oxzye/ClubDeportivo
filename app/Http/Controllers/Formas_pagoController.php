<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formas_pago;

class Formas_pagoController extends Controller
{
    public function index () {
        
        // $Formas_pago = Formas_pago::orderBy('id_fdp', 'asc')->paginate(4);
        $Formas_pago = Formas_pago::paginate(5);
        
        // $Formas_pago = Formas_pago::all();

        return view('panel.Formas_pago.index', compact('Formas_pago'));
    }

    public function create () {
        return view('panel.Formas_pago.create');
    }

    public function store (Request $request) {
        //Validacion de los datos
        $validated = $request->validate(
            [
                'forma_pago_fdp' => 'required|unique:Formas_pago|max:50',
                'descripcion_fdp' => 'nullable|string|max:255',
            ],
            [
                'forma_pago_fdp.required' => 'Forma de pago es obligatorio.',
                'forma_pago_fdp.unique' => 'La forma de pago ya está registrado',
                'forma_pago_fdp.string' => 'La forma de pago debe ser una cadena de texto.',
                'forma_pago_fdp.max' => 'La forma de pago no debe tener más de 50 caracteres.',
                'description.string' => 'La descripción debe ser una cadena de texto.',
                'description.max' => 'La descripción no debe tener más de 255 caracteres.',
            ]);
        // Guardado de los datos
        if ($validated) {
            Formas_pago::create($request->all());
        }
        //Redir
        return redirect()->route('Formas_pago.index')->with('status', 'Forma de pago creado correctamente');
    }

    public function edit($id_fdp) {
        $Formas_pago = Formas_pago::findOrFail($id_fdp);
        return view('panel.Formas_pago.edit', ['Formas_pago' => $Formas_pago]);
    }

    public function update(Request $request, $id_fdp){
        //busqueda
        $Formas_pago = Formas_pago::findOrFail($id_fdp);
        
        //Validacion de los datos
        $validated = $request->validate(
            [
                'forma_pago_fdp' => 'required|max:50|unique:Formas_pago,forma_pago_fdp,' . $id_fdp . ',id_fdp',
                'descripcion_fdp' => 'nullable|string|max:255',
            ],
            [
                'forma_pago_fdp.required' => 'Forma de pago es obligatorio.',
                'forma_pago_fdp.unique' => 'La forma de pago ya está registrado',
                'forma_pago_fdp.string' => 'La forma de pago debe ser una cadena de texto.',
                'forma_pago_fdp.max' => 'La forma de pago no debe tener más de 50 caracteres.',
                'description.string' => 'La descripción debe ser una cadena de texto.',
                'description.max' => 'La descripción no debe tener más de 255 caracteres.',
            ]);
        // Guardado de los datos
        if ($validated) {        
            //actualizacion
            $Formas_pago->update($request->all());
        }
        //redireccion
        return redirect()->route('Formas_pago.index')->with('status', 'Forma de pago Actualizado correctamente');
    }

    public function destroy($id_fdp) {
        //busqueda
        $Formas_pago = Formas_pago::findOrFail($id_fdp);

        //elminacion
        $Formas_pago->delete();

        //redireccion
        return redirect()->route('Formas_pago.index')->with('status', 'Forma de pago eliminado correctamente');
    }
    public function show($id){
        $Formas_pago = Formas_pago::findOrFail($id);
        return view( 'Formas_pago.show', [ 'Formas_pago' => $Formas_pago ]);
    }
}

