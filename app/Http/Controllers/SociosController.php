<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socio;
use App\Models\User;
use App\Models\generos;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Hash;

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
        $generos = generos::all();
        return  view('panel.socios.create',compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario (agrega validaciones según tus necesidades).
        // Define las reglas de validación
        $rules = [
            'name' =>       'required|string|max:40',
            'apellido' =>   'required|string|max:40',
            'dni' =>        'required|integer|unique:users|min:10000000|max:99999999',
            'cuil_soc' =>   'required|integer|unique:socios|min:1000000000|max:9999999999',
            'email' =>      'required|string|unique:users|max:255|email',
            'fecha_nac' =>  'required|date|before:tomorrow',
            'cod_genero' => 'required|integer',
            'domicilio' =>  'required|string|max:200',
            'telefono' =>   'required|string|max:20',
            'fecha_asociacion' => 'required|date|after:fecha_nac',
            'observaciones_soc'=> 'string|max:40',
        ];

        // Define los mensajes de error personalizados (opcional)
        $messages = [
            'required' => 'Debe llenar el campo :attribute.',
            'max' => 'El :attribute es demasiado largo.',
            '*.unique' => 'Ese :attribute ya esta registrado',
            'dni.*' => 'Ingrese un DNI valido',
            'cuil_soc.*' => 'Ingrese un CUIL valido',
            'email.*' =>'Ingrese un Email valido',
        ];

        // Valida los datos del formulario
        $request->validate($rules, $messages);

        //Contraseña aleatoria
        $password = $request->input('dni') - 11111111;
        // Crea un registro en la tabla 'users'.
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'apellido' =>$request->input('apellido'),
            'dni' =>$request->input('dni'),
            'fecha_nac' =>$request->input('fecha_nac'),
            'domicilio' =>$request->input('domicilio'),
            'telefono' =>$request->input('telefono'),
            'cod_genero' => $request->input('cod_genero'),
            'password' =>Hash::make($password),
        ]);

        // Obtiene el ID del usuario creado.
        $userId = $user->id;

        // Crea un registro en la tabla 'socios' con el ID del usuario.
        Socio::create([
            'id_user' => $userId,
            'cuil_soc'=>$request->input('cuil_soc'),
            'fecha_asociacion'=> $request->input('fecha_asociacion'),
            'observaciones_soc'=> $request->input('observaciones_soc'),
            // Otros campos de 'socios'.
        ]);

        // Redirige o realiza otras acciones según tus necesidades.
        Mail::to($user->email)->send(new WelcomeMail($user));

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
