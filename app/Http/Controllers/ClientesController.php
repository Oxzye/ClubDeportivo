<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;
use App\Models\Localidades;
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
         //valid
        $validated = $request->validate(
            [
                'nombre_cli' => 'required|string|max:40',
                'apellido_cli' => 'required|string|max:40',
                'dni_cli' => 'required|integer|unique:clientes|min:10000000|max:99999999',
                'fecha_nac_cli' => 'required|date|before:tomorrow',
                'cod_genero' => 'required|integer',
                'domicilio_cli' => 'required|string|max:200',
                'telefono_cli' => 'required|string|max:20',
                'email_cli' => 'required|max:255|email',
                'observaciones'=> 'nullable|string|max:40',
                // 'fecha_asociacion' => 'required|date|after:fecha_nac',
            ],[
                'required' => 'Debe llenar el campo :attribute.',
                'max' => 'El :attribute es demasiado largo.',
                '*.unique' => 'Ese :attribute ya esta registrado',
                'dni_cli.*' => 'Ingrese un DNI valido',
                'email_cli.*' =>'Ingrese un Email valido',
                'fecha_nac_cli' => 'Ingrese una fecha valida',
            ]);
            if($validated) {

                $clientes = new clientes();
                //Guardado de los datos

                $clientes->nombre_cli = $request->get('nombre_cli');
                $clientes->apellido_cli = $request->get('apellido_cli');
                $clientes->dni_cli = $request->get('dni_cli');
                $clientes->fecha_nac_cli = $request->get('fecha_nac_cli');
                $clientes->cod_genero = $request->get('cod_genero');
                $clientes->domicilio_cli = $request->get('domicilio_cli');
                $clientes->telefono_cli = $request->get('telefono_cli');

                $clientes->id_loc = $request->get('id_loc');
                $clientes->email_cli = $request->input('email_cli');
                $clientes->observaciones = $request->get('observaciones');

                $clientes->save();
            };
         //redireccionar
         return redirect()->route('clientes.index')->with('status', 'Cliente creado correctamente');
        }

    public function edit( $dni_cli)
    {
        $clientes = Clientes::findOrFail($dni_cli);
        if($clientes){
            $generos = generos::all();
            $localidades = Localidades::all();
            return view('panel.clientes.edit', compact('generos', 'localidades', 'clientes'));
        }
        else{
            return redirect()->route('clientes.index')->with('error', 'Cliente no encontrado');
        };
    }

    public function show(string $cli)
    {
        $cliente = clientes::findOrFail($cli);
        return view ('panel.clientes.show', ['cliente'=> $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $dni_cli)
    {
       $clientes = clientes::findOrFail($dni_cli);
 //Guardado de los datos
                $clientes->nombre_cli = $request->input('nombre_cli');
                $clientes->apellido_cli = $request->input('apellido_cli');
                $clientes->dni_cli = $request->get('dni_cli');
                $clientes->fecha_nac_cli = $request->input('fecha_nac_cli');
                $clientes->cod_genero = $request->input('cod_genero');
                $clientes->domicilio_cli = $request->input('domicilio_cli');
                $clientes->telefono_cli = $request->input('telefono_cli');
                $clientes->id_loc = $request->get('id_loc');
                $clientes->email_cli = $request->input('email_cli');
                $clientes->observaciones = $request->get('observaciones');

                $clientes->save();

       //actualizacion
       return redirect()->route('clientes.index','dni_cli')->with('status','Cliente modificado correctamente');
    }

    public function show($dni_cli)
    {
    $generos = generos::all();
    $localidades = Localidades::all();
    $clientes = clientes::findOrFail($dni_cli);
    return view('panel.clientes.show', compact('generos', 'localidades', 'clientes'));
    }

    public function destroy(clientes $dni_cli)
    {
        $clientes = clientes::findOrFail($dni_cli);
        //Eliminicacion
        $clientes->delete();

              //redireccion
              return redirect()->route('clientes.index')->with('status', 'eliminado correctamente');
    }

}