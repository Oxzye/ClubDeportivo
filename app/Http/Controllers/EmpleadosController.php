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
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::with('user')->get();
        return view('panel.empleados.index', compact('empleados',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargos = Cargos::all();
        $generos = generos::all();
        return  view('panel.empleados.create', compact('cargos', 'generos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario (agrega validaciones según tus necesidades).
        $request->validate([
            'cuit_emp' =>   'required|integer|unique:empleados|min:1000000000|max:9999999999',
            'dni' =>        'required|integer|min:10000000|max:99999999',
            'name' =>       'required|string|max:40',
            'apellido' =>   'required|string|max:40',
            'fecha_nac' =>  'required|date|before:tomorrow',
            'domicilio' =>  'required|string|max:200',
            'telefono' =>   'required|string|max:20',
            'cod_genero' => 'required|integer',
            'email' =>      'required|string|unique:users|max:255|email',
            'fecha_alta_emp' => 'required|date|after:fecha_nac',
        ]);
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
            'cod_genero' => $request->input('cod_genero'),
            'password' => Hash::make($password),
        ]);

        // Obtiene el ID del usuario creado.
        $userId = $user->id;

        // Crea un registro en la tabla 'empleados' con el ID del usuario.
        Empleado::create([
            'id_cargo' => $request->input('id_cargo'),
            'id_user' => $userId,
            'cuit_emp' => $request->input('cuit_emp'),
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
        // Recupera el socio y el usuario que deseas editar
        $generos = generos::all();
        $cargos = Cargos::all();
        $empleado = Empleado::with('user')->find($id);

        // Muestra el formulario de edición con los datos actuales del socio y el usuario
        return view('panel.empleados.edit', compact('empleado', 'generos', 'cargos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //agregando recuperacion de socio
        $empleado = Empleado::with('user')->find($id);
        // Valida los datos del formulario de edición
        $request->validate([
            'cuit_emp' => 'required|integer|unique:empleados,cuit_emp,' . $id . ',id_emp',
            'name' => 'required|string|max:40',
            'apellido' => 'required|string|max:40',
            'dni' => 'required|integer|min:10000000|max:99999999',
            'fecha_nac' => 'required|date|before:tomorrow',
            'domicilio' => 'required|string|max:200',
            'telefono' => 'required|string|max:20',
            'cod_genero' => 'required|integer',
            'email' => 'required|string|max:255|email|unique:users,email,' . $empleado->user->id,
        ]);

        // Actualiza los datos en la tabla 'users'
        $empleado->user->update([
            'name' => $request->input('name'),
            'apellido' => $request->input('apellido'),
            'dni' => $request->input('dni'),
            'fecha_nac' => $request->input('fecha_nac'),
            'domicilio' => $request->input('domicilio'),
            'telefono' => $request->input('telefono'),
            'cod_genero' => $request->input('cod_genero'),
            'email' => $request->input('email'),
        ]);

        // Actualiza los datos en la tabla 'socios'
        $empleado->update([
            'cuit_emp' => $request->input('cuit_emp'),
            'id_cargo' => $request->input('id_cargo'),
            'fecha_alta_emp' => $empleado->fecha_alta_emp,
            'fecha_baja_emp' => $request->input('observaciones_soc'),
            // Otros campos...
        ]);

        // Redirige a la vista de detalles o cualquier otra ruta que desees
        return redirect()->route('empleados.index', $id)->with('status', 'Empleado actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Recupera el empleado y el usuario que deseas eliminar
        $empleado = Empleado::with('user')->find($id);

        // Elimina el registro de 'empleados'
        $empleado->delete();

        // Elimina el registro de 'users'
        $empleado->user->delete();

        // Redirige a la vista de empleados o cualquier otra ruta que desees
        return redirect()->route('empleados.index')->with('status', 'Empleado eliminado correctamente');
    }

    public function dadosdebaja()
    {
        $empleados = Empleado::onlyTrashed()->orderBy('deleted_at', 'asc')->with('user')->get();
        //logger($socios[0]->cuil_soc);
        return view('panel.empleados.dadosdebaja', compact('empleados'));
    }

    public function restore(string $id)
    {
        $datos = User::onlyTrashed()->find($id);
        // Restaura el modelo 'User'
        $user = User::whereId($id);
        $user->restore();

        // Restaura el modelo 'Socio'
        $empleado = Empleado::where('id_user', $id);
        $empleado->restore();


        return redirect()->route('empleados.dadosdebaja')->with('status', 'Empleado: ' . $datos->name . " " . $datos->apellido  . ' recuperado exitosamente');
    }
}
