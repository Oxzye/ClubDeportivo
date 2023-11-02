<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socio;
use App\Models\User;

class SociosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socios = Socio::with('user')->get();

        return view('panel.socios.index', compact('socios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('panel.socios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario (agrega validaciones según tus necesidades).

        // Crea un registro en la tabla 'users'.
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'apellido' =>$request->input('apellido'),
            'dni' =>$request->input('dni'),
            'fecha_nac' =>$request->input('fecha_nac'),
            'domicilio' =>$request->input('domicilio'),
            'telefono' =>$request->input('telefono'),
            'password' =>'12345',
        ]);

        // Obtiene el ID del usuario creado.
        $userId = $user->id;

        // Crea un registro en la tabla 'socios' con el ID del usuario.
        Socio::create([
            'id_user' => $userId,
            'cuil_soc'=>'2434396736',
            'fecha_asociacion'=>'2022-09-01',
            // Otros campos de 'socios'.
        ]);

        // Redirige o realiza otras acciones según tus necesidades.

        /*valid

        //guardado de datos
        Socio::create($request->all());*/

        //Redir
        return redirect()->route('socios.index')->with('status', 'Socio creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
