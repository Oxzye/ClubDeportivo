<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use App\Models\Cuotas;
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

class CuotasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dni = $request->get('dni');
        $resultados = User::CuotasPagadas($dni)->get();

        /*RAW SQL : 
        SELECT 
            users.dni,
            users.name,
            users.apellido,
            tipos_detalle_factura.tipodetalle,
            tipos_detalle_factura.descripcion_tdf,
            facturas.fecha_pago_fac
            FROM detalles_factura
            JOIN facturas ON detalles_factura.num_fac = facturas.num_fac
            JOIN socios ON facturas.dni_soc = socios.id_soc
            JOIN users ON socios.id_user = users.id
            JOIN tipos_detalle_factura ON detalles_factura.id_tipodetallefactura = tipos_detalle_factura.id_tipodetallefactura
            WHERE users.dni = "43439673";
        */
        $info = null;
        if (!$resultados->count()) {
            $info = DB::table('users')
                ->select('users.dni', 'users.name', 'users.apellido')
                ->join('socios', 'socios.id_user', '=', 'users.id')
                ->where('users.dni', '=', $dni)
                ->get();
        }
        return view('panel.cuota_social.index', compact('resultados', 'info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function cobrar(string $dni)
    {

        $socio = User::with('socio')->where('dni', $dni)->first();

        $cajasAbierta = Cajas::where('estado_caja', 1)->first();

        $cuotastodas = Tipodetfactura::where('tipodetalle', 'Cuota Social')
        ->where('tipos_detalle_factura.created_at', '>', $socio->socio->fecha_asociacion)
            ->get();      
        $resultados = User::CuotasPagadas($dni)->get();

        
        $cuotas = $cuotastodas->reject(function ($cuota) use ($resultados) {
            return $resultados->contains('descripcion_tdf', $cuota->descripcion_tdf);
        });

        $formdp = Formas_pago::all();
        $tipofac = Tipo_factura::all();

        return view('panel.cuota_social.cobrar', compact('socio', 'cajasAbierta', 'cuotas','formdp', 'tipofac'));
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
            'tipo_fac' => $request->input('id_fdp'),
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
            'id_tipodetallefactura' => $request->input('cuota'),
            'num_fac' => $num_factura,
        ]);
        $realdni = User::join('socios', 'users.id', '=', 'socios.id_user')
            ->where('socios.id_soc', $request->input('id_soc'))
            ->select('users.dni')
            ->first();
        $dni = $realdni;

        return Redirect::route('cuota_social.index', ['dni' => $dni->dni])->with('status', 'Cobro de cuota registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuotas $cuotas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuotas $cuotas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuotas $cuotas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuotas $cuotas)
    {
        //
    }
}
