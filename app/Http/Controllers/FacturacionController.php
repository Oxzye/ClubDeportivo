<?php

namespace App\Http\Controllers;
use App\Models\Facturacion;
use App\Models\Cajas;
use App\Models\Formas_pago;
use App\Models\Tipo_factura;
use App\Models\Socio;
use App\Models\Clientes;
use Illuminate\Http\Request;

class FacturacionController extends Controller
{
    public function index () {

        //$empleado = new Cajas;
        $cajas = Cajas::all();
        $empleado = Empleado::all();
        /*$cajaso = Cajas::orderBy('id_caja', 'desc')->get();
        $cajaAbierta = $cajaso->where('estado_caja', true);*/
        return view('panel.Cajas.index', compact('cajas', 'empleado', 'cajaAbierta'));
    }

    public function create () {
        $empleado = Empleado::all();
        $cajas = Cajas::all();
        return view('panel.Cajas.create', compact('cajas', 'empleado'));
 
    }

    public function store (Request $request) {
        //valid
        $cajas = new Cajas();
        //Guardado de los datos
        $cajas->monto_inicial_caja = $request->get('monto_inicial_caja');
        $cajas->saldo_caja = $request->get('saldo_caja');
        $cajas->id_emp = $request->get('id_emp');
        $cajas->total_ventas_caja = $request->get('total_ventas_caja');
        $cajas->estado_caja = $request->get('estado_caja');
        $cajas->monto_final = $request->get('monto_final');
       
        $cajas ->save();
        //Redir
        //echo '<script>showCajaIndicator();</script>';
       return redirect()->route('Cajas.index')->with('status', 'Caja abierta correctamente');
    }

    public function edit($id_caja) {
        $caja = Cajas::findOrFail($id_caja);
        $empleado = Empleado::all();
        
        if ($caja) {
            return view('panel.Cajas.edit', compact('caja', 'empleado'));
        } else {
            return redirect()->route('Cajas.index')->with('error', 'Caja no encontrada');
        }
    }

    public function update(Request $request, $id){
        //$empleado = Paises::all();
        $cajas = Cajas::findOrFail($id);
        $cajas->monto_inicial_caja = $request->input('monto_inicial_caja');
        $cajas->total_ventas_caja = $request->input('total_ventas_caja');
        $cajas->saldo_caja = $request->input('saldo_caja');
        $cajas->id_emp = $request->input('id_emp');
        $cajas->estado_caja = $request->input('estado_caja');
        $cajas->monto_final = $request->input('monto_final');
        $cajas->save();
        
        echo '<script>hideCajaIndicator();</script>';
        //redireccion
        return redirect()->route('Cajas.index')->with('status', 'Cajas Cerrada correctamente');
    }

    public function destroy($id) {
        //busqueda
        $cajas = Cajas::findOrFail($id);

        //elminacion
        $cajas->delete();

        
        return redirect()->route('Cajas.index')->with('status', 'Cajas eliminada correctamente');
    }
    public function show($id)
    {
        // Lógica para mostrar una caja específica por su ID
        $cajas = Cajas::findOrFail($id);
        $cajaso = Cajas::orderBy('id_caja', 'desc')->get();
        $cajaAbierta = $cajaso->where('estado_caja', true);
        // Puedes pasar la caja a una vista o realizar cualquier otra lógica necesaria
        return view('panel.Cajas.index', compact('cajas','cajaAbierta'));
    }
}
