<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;
use App\Models\Localidades;
use App\Models\Paises;
use App\Models\Provincias;
use App\Models\generos;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
         $clientes = new clientes();
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

    /**
     * Display the specified resource.
     */
    public function show(clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, clientes $clientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(clientes $clientes)
    {
        //
    }
}
