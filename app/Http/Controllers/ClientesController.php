<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;
use App\Models\Localidades;
use App\Models\generos;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $generos = generos::all();
        $localidades = Localidades::all();
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
         $clientes->cod_genero = $request->get('cod_genero');
         $clientes->id_loc = $request->get('id_loc');
         $clientes->nombre_cli = $request->get('nombre_cli');
         $clientes->apellido_cli = $request->get('apellido_cli');
         $clientes->domicilio_cli = $request->get('domicilio_cli');
         $clientes->telefono_cli = $request->get('telefono_cli');
         $clientes->fecha_nac_cli = $request->get('fecha_nac_cli');
         $clientes->email_cli = $request->get('email_cli');
         $clientes->observaciones = $request->get('observaciones');
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
