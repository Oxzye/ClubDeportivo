<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\User;
use App\Models\Cargos;
use App\Models\generos;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\Paises;
use App\Models\Localidades;
use App\Models\Provincias;
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
        $paises = Paises::all();
        $provincias = Provincias::all();
        $localidades = Localidades::all(); // Cambié $localidad a $localidades
        return view('panel.empleados.create', compact('cargos', 'generos', 'paises', 'localidades', 'provincias'));
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
            'fecha_baja_emp' => 'required|date|after:fecha_nac',
            'id_pais' => 'required|exists:paises,id',
            'id_prov' => 'required|exists:provincias,id', 
            'id_loc' => 'required|exists:localidades,id',
            'id_cargo' => 'required|exists:cargos,id',
            
        ],[
            'name.required' => 'El campo nombre es obligatorio',
            'name.string' => 'Ingrese texto',
            'name.max' => 'Solo se permiten hasta 40 caracteres',
            
            'apellido.required' => 'El campo apellido es obligatorio',
            'apellido.string' => 'Ingrese texto',
            'apellido.max' => 'Solo se permiten hasta 40 caracteres',

            'dni.required' => 'El campo dni es obligatorio',
            'dni.integer' => 'Ingrese valores numéricos',

            'cuit_emp.required' => 'El campo cuit es obligatorio',
            'cuit_emp.integer' => 'Ingrese valores numéricos',
            'cuit_emp.unique' => 'El cuit ya está registrado',

            'fecha_nac.required' => 'El campo fecha de nacimiento es obligatorio',
            'fecha_nac.date' => 'Por favor indique una fecha válida',
            'fecha_nac.string' => 'Ingrese formato fecha DD/MM/YYYY',
            'fecha_nac.before:tomorrow' => 'Ingrese una fecha de nacimiento válida',

            'cod_genero.required' => 'El campo género es obligatorio',
            'cod_genero.integer' => 'Ingrese un valor',

            'domicilio.required' => 'El campo domicilio es obligatorio',
            'domicilio.string' => 'Ingrese un domicilio por favor',
            'domicilio.max' => 'Solo se permiten hasta 200 caracteres',

            'telefono.required' => 'El campo telefono es obligatorio',
            'telefono.string' => 'Ingrese un teléfono valido',
            'telefono.max' => 'Solo se permiten hasta 20 caracteres',

            'id_pais.required' => 'El campo países es obligatorio',
            'id_pais.exist:paises, id' => 'El país no existe en la base de datos',
            
            'id_prov.required' => 'El campo provincia es obligatorio',
            'id_prov.exist:provincias, id' => 'La provincia no existe en la base de datos',
            
            'id_loc.required' => 'El campo localidades es obligatorio',
            'id_loc.exist:localidades, id' => 'La localidad no existe en la base de datos',
            
            'email.required' => 'El campo email es obligatorio',
            'email.string' => 'Ingrese un email válido',
            'email.unique:users' => 'Este email ya existe',
            'email.email' => 'El campo debe ser formato email',

            'fecha_alta_emp.required' => 'El campo fecha de alta empleado es obligatorio',
            'fecha_alta_emp.after:fecha_nac' => 'Ingrese una fecha válida',

            'fecha_baja_emp.required' => 'El campo fecha de baja empleado es obligatorio',
            'fecha_baja_emp.after:fecha_nac' => 'Ingrese una fecha válida',

            'id_cargo.required' => 'El campo cargo es obligatorio',
            'id_cargo.exist:localidades, id' => 'El cargo no existe en la base de datos',
           
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
            'cod_genero'=> $request->input('cod_genero'),
            'id_prov'=> $request->input('id_prov'),
            'id_pais'=> $request->input('id_pais'),
            
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
        $paises = Paises::all();
        $provincias = Provincias::all();
        $localidades = Localidades::all(); // Cambié $localidad a $localidades
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
        ],[
                'name.required' => 'El campo nombre es obligatorio',
                'name.string' => 'Ingrese texto',
                'name.unique' => 'El nombre ya está registrado',
                'name.max' => 'Solo se permiten hasta 40 caracteres',
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
