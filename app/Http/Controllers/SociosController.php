<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socio;
use App\Models\User;
use App\Models\generos;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SociosExportExcel;
use App\Exports\SociosBajaExportExcel;
use Maatwebsite\Excel\Facades\Excel;


class SociosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socios = Socio::with('user')->get();
        //logger($socios[0]->cuil_soc);

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
            // 'fecha_asociacion' => 'required|date|after:fecha_nac',
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
            'fecha_nac' => 'Ingrese una fecha valida',
            // 'fecha_asociacion' => 'Ingrese una fecha valida',

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
        // Recupera el socio y el usuario que deseas editar
        $generos = generos::all();
        $socio = Socio::with('user')->find($id);

        // Formatea la fecha_asociacion antes de pasarla a la vista
        Carbon::setLocale('es');
        $socio->fecha_asociacion = Carbon::parse($socio->fecha_asociacion)->isoformat('DD MMMM YYYY');

        // Muestra el formulario de edición con los datos actuales del socio y el usuario
        return view('panel.socios.edit', compact('socio','generos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $socio = Socio::with('user')->find($id);
        // Valida los datos del formulario de edición
        $request->validate([
            'cuil_soc' => 'required|integer|unique:socios,cuil_soc,' . $id .',id_soc',
            'observaciones_soc' => 'string|max:40',
            'name' => 'required|string|max:40',
            'apellido' => 'required|string|max:40',
            'dni' => 'required|integer|min:10000000|max:99999999',
            'fecha_nac' => 'required|date|before:tomorrow',
            'domicilio' => 'required|string|max:200',
            'telefono' => 'required|string|max:20',
            'cod_genero' => 'required|integer',
            'email' => 'required|string|max:255|email|unique:users,email,' . $socio->user->id,
        ]);

        // Actualiza los datos en la tabla 'users'
        $socio->user->update([
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
        $socio->update([
            'cuil_soc' => $request->input('cuil_soc'),
            'fecha_asociacion' => $socio->fecha_asociacion,
            'observaciones_soc' => $request->input('observaciones_soc'),
            // Otros campos...
        ]);

        // Redirige a la vista de detalles o cualquier otra ruta que desees
        return redirect()->route('socios.index', $id)->with('status', 'Socio actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Recupera el empleado y el usuario que deseas eliminar
        $socio = Socio::with('user')->find($id);

        // Elimina el registro de 'empleados'
        $socio->delete();

        // Elimina el registro de 'users'
        $socio->user->delete();

        // Redirige a la vista de empleados o cualquier otra ruta que desees
        return redirect()->route('socios.index')->with('status', 'Socio eliminado correctamente');
    }

    public function dadosdebaja()
    {
        $socios = Socio::onlyTrashed()->orderBy('deleted_at', 'asc')->with('user')->get();

        //logger($socios[0]->cuil_soc);
        return view('panel.socios.dadosdebaja', compact('socios'));
    }

    public function restore(string $id)
    {
        $datos = User::onlyTrashed()->find($id);
        // Restaura el modelo 'User'
        $user = User::whereId($id);
        $user->restore();

        // Restaura el modelo 'Socio'
        $socio = Socio::where('id_user', $id);
        $socio->restore();


        return redirect()->route('socios.dadosdebaja')->with('status', 'Socio ' . $datos->name." ".$datos->apellido  . ' recuperado exitosamente');
    }

    public function exportarSociosPDF() {
        set_time_limit(6000);
        // $admin_id = auth()->user()->id;
            // Traemos las actividades con relaciones a instalaciones y deportes
        // $actividades = Actividad::with('instalacion', 'deporte')
        //     ->where('id_act',auth()->user()->id)->get();

            $socios = Socio::all();
        // capturamos la vista y los datos que enviaremos a la misma
        $pdf = Pdf::loadView('panel.socios.pdf_socios', compact('socios'));
        //Renderizamos la vista
        $pdf->render();
        // Visualizaremos el PDF en el navegador
        return $pdf->stream('socios.pdf');
        }

    public function exportarSociosExcel() {
        return Excel::download(new SociosExportExcel, 'socios.xlsx');
    }

    public function exportarSociosBajaExcel() {
        return Excel::download(new SociosBajaExportExcel, 'socios_baja.xlsx');
    }
}
