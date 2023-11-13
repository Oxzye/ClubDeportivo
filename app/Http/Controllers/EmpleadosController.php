<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\User;
use App\Models\Cargos;
use App\Models\generos;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Hash;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::with('user')->get();
        $empleados = Empleado::paginate(2);

        return view('panel.empleados.index', compact('empleados',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargos = Cargos::all();
        $generos = generos::all();
        return  view('panel.empleados.create',compact('cargos','generos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario (agrega validaciones según tus necesidades).

        //Contraseña aleatoria
        $password = $request->input('dni') - 11111111;
        // Crea un registro en la tabla 'users'.
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'apellido' => $request->input('apellido'),
            'dni' => $request->input('dni'),
            'fecha_nac' => $request->input('fecha_nac'),
            'domicilio' => $request->input('domicilio'),
            'telefono' => $request->input('telefono'),
            'cod_genero'=> $request->input('cod_genero'),
            'password' => Hash::make($password),
        ]);

        // Obtiene el ID del usuario creado.
        $userId = $user->id;

        // Crea un registro en la tabla 'empleados' con el ID del usuario.
        Empleado::create([
            'id_cargo' => $request->input('id_cargo'),
            'id_user' => $userId,
            'cuit_emp' => $request->input('cuit'),
            'fecha_alta_emp' => $request->input('fecha_alta_emp'),
            'fecha_baja_emp' => $request->input('fecha_baja_emp'),
            // Otros campos de 'empleados'.
        ]);

        // Redirige o realiza otras acciones según tus necesidades.
        Mail::to($user->email)->send(new WelcomeMail($user));

        //Redir
        return redirect()->route('empleados.index')->with('status', 'empleado creado correctamente');
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
        $cargos = Cargos::all();
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
