<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cajas;
use App\Models\Detalles_Factura;
use App\Models\tipodetfactura;
use Illuminate\Support\Facades\DB;
use App\Models\Facturacion;
use App\Models\Formas_pago;
use Carbon\Carbon;
use App\Models\Tipo_factura;
use App\Models\Socio;

use Illuminate\Support\Facades\Redirect;

class CobroActPartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dni = $request->get('dni');
        $resultados = User::select(
            'users.dni',
            'users.name',
            'users.apellido',
            'actividades.nombre_act',
            'actividades.descripcion_act',
            'sociosxactividades.fecha_inscripcion'
        )
            ->join('socios', 'users.id', '=', 'socios.id_user')
            ->join('sociosxactividades', 'socios.id_soc', '=', 'sociosxactividades.id_soc')
            ->join('actividades', 'sociosxactividades.id_act', '=', 'actividades.id_act')
            ->where('users.dni', '=', $dni)
            ->get();

        $info = null;
        if (!$resultados->count()) {
            $info = DB::table('users')
                ->select('users.dni', 'users.name', 'users.apellido')
                ->join('socios', 'socios.id_user', '=', 'users.id')
                ->where('users.dni', '=', $dni)
                ->get();
        }
        return view('panel.insc_act_part.index', compact('resultados', 'info'));
    }

    public function cobrar(string $dni)
    {

        $socio = User::with('socio')->where('dni', $dni)->first();

        $cajasAbierta = Cajas::where('estado_caja', 1)->first();

        $actpagadas = User::select(
            'users.dni',
            'users.name',
            'users.apellido',
            'actividades.id_act',
            'actividades.nombre_act',
            'actividades.descripcion_act',
            'actividades.precio_act',
            'facturas.fecha_pago_fac'
        )
            ->join('socios', 'users.id', '=', 'socios.id_user')
            ->join('facturas', 'socios.id_soc', '=', 'facturas.dni_soc')
            ->join('detalles_factura', 'facturas.num_fac', '=', 'detalles_factura.num_fac')
            ->join('actividades', 'detalles_factura.id_act', '=', 'actividades.id_act')
            ->where('users.dni', '=', $dni)
            ->get();

        $resultados = User::select(
            'users.dni',
            'users.name',
            'users.apellido',
            'actividades.id_act',
            'actividades.nombre_act',
            'actividades.descripcion_act',
            'actividades.precio_act',
            'sociosxactividades.fecha_inscripcion'
        )
            ->join('socios', 'users.id', '=', 'socios.id_user')
            ->join('sociosxactividades', 'socios.id_soc', '=', 'sociosxactividades.id_soc')
            ->join('actividades', 'sociosxactividades.id_act', '=', 'actividades.id_act')
            ->where('users.dni', '=', $dni)
            ->get();


        $actividadesNoPagadas = $resultados->reject(function ($actividad) use ($actpagadas) {
            return $actpagadas->contains('id_act', $actividad->id_act);
        });


        $formdp = Formas_pago::all();
        $tipofac = Tipo_factura::all();

        return view('panel.insc_act_part.cobrar', compact('socio', 'cajasAbierta', 'actividadesNoPagadas', 'formdp', 'tipofac'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fecha_hoy = Carbon::now();

        $factura = new Facturacion([
            'dni_soc' => $request->input('id_soc'),
            'id_caja' => $request->input('id_caja'),
            'tipo_fac' => $request->input('tipo_fac'),
            'id_fdp' => $request->input('id_fdp'),
            'fecha_fac' => $fecha_hoy,
            'monto_fac' => $request->input('montoFinal'),
            'fecha_pago_fac' => $fecha_hoy,
            'pagada_fac' => $request->input('pagada_fac'),
        ]);


        $cajas = Cajas::findOrFail($request->get('id_caja'));
        $cajas->total_ventas_caja += 1; // Incrementar la cantidad de ventas
        $cajas->monto_final += $request->input('montoFinal'); // Incrementar el monto recaudado
        $cajas->save();
        $factura->save();

        $num_factura = $factura->num_fac;
        Detalles_Factura::create([
            'id_act' => $request->input('id_act'),
            'num_fac' => $num_factura,
        ]);

        $realdni = User::join('socios', 'users.id', '=', 'socios.id_user')
        ->where('socios.id_soc', $request->input('id_soc'))
        ->select('users.dni')
        ->first();
        $dni = $realdni;

        return Redirect::route('insc_act_part.index', ['dni' => $dni->dni])->with('status', 'Cobro de Actividad particular registrado correctamente');


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
