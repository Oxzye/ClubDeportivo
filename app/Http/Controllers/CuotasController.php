<?php

namespace App\Http\Controllers;

use App\Models\Cuotas;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cajas;
use App\Models\tipodetfactura;
use Illuminate\Support\Facades\DB;
use App\Models\Facturacion;
use Carbon\Carbon;

class CuotasController extends Controller
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
            'tipos_detalle_factura.tipodetalle',
            'tipos_detalle_factura.descripcion_tdf',
            'facturas.fecha_pago_fac'
        )
            ->join('socios', 'users.id', '=', 'socios.id_user')
            ->join('facturas', 'socios.id_soc', '=', 'facturas.dni_soc')
            ->join('detalles_factura', 'facturas.num_fac', '=', 'detalles_factura.num_fac')
            ->join('tipos_detalle_factura', 'detalles_factura.id_tipodetallefactura', '=', 'tipos_detalle_factura.id_tipodetallefactura')
            ->where('users.dni', '=', $dni)
            ->get();

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
        $info = $dni;
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
        $allCuotas = tipodetfactura::where('tipodetalle','Cuota Social')->get()->reverse();

        return view('panel.cuota_social.cobrar', compact('socio', 'cajasAbierta','allCuotas'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $caja = Cajas::findOrFail($request->get('id_caja'));
        $fecha_hoy = Carbon::now();
        if ($request->get('pagada_fac') == 1) {
            $fecha_pago = Carbon::now();
        } else {
            $fecha_pago = null;
        }

        $factura = Facturacion::create([
            'id_caja' => $request->input('id_caja'),
            'id_fdp' => $request->input('id_fdp'),
            'dni_soc' => $request->input('id_soc'),
            'facha_fac' => $fecha_hoy,
            'monto_fac' => '',
            'fecha_pago_fac' => $fecha_pago,
            'pagada_fac' => $request->input('pagada_fac'),
        ]);
        
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
