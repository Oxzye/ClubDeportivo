<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;
use App\Models\Localidades;
use App\Models\Paises;
use App\Models\Provincias;
use App\Models\generos;
use Illuminate\Auth\Events\Validated;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $localidades = Localidades::all();
        $generos = generos::all();
        $clientes = clientes::paginate(3);
        return view('panel.clientes.index', compact('generos', 'localidades', 'clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = generos::all();
        $localidades = Localidades::all();
        // $paises = Paises::all();
        // $provincias = Provincias::all();
        $clientes = clientes::paginate(3);
        return view('panel.clientes.create', compact('generos', 'localidades', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $clientes = new clientes();
            //validacion

            //Guardado de los datos
                $clientes->dni_cli = $request->input('dni_cli');
                $clientes->cod_genero = $request->input('cod_genero');
                $clientes->id_loc = $request->input('id_loc');
                $clientes->nombre_cli = $request->input('name');
                $clientes->apellido_cli = $request->input('apellido');
                $clientes->domicilio_cli = $request->input('domicilio');
                $clientes->telefono_cli = $request->input('telefono');
                $clientes->fecha_nac_cli = $request->input('fecha_nac');
                $clientes->email_cli = $request->input('email');
                $clientes->observaciones = $request->input('observaciones');
                $clientes->save();           

        
                   //redireccionar
                    return redirect()->route('clientes.index')->with('status', 'Cliente creado correctamente');
        }

    public function edit(clientes $dni_cli)
    {
        $clientes = Clientes::all();
        if($clientes){
            $generos = generos::all();
            $localidades = Localidades::all();
            return view('panel.clientes.edit', compact('generos', 'localidades', 'clientes'));
        }
        else{
            return redirect()->route('clientes.index')->with('error', 'Cliente no encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $dni_cli)
    {
       $clientes = clientes::findOrFail($dni_cli);
       return redirect()->route('clientes.index')->with('status','Cliente modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($dni_cli)
    {
        $clientes = clientes::findOrFail($dni_cli);

        //Eliminicacion
        $clientes->delete();

              //redireccion
              return redirect()->route('clientes.index')->with('status', 'eliminado correctamente');
    }

}