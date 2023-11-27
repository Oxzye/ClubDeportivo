<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cajas;
use App\Models\Empleado;

class CajasController extends Controller
{
    public function index (Request $request) {

        //$empleado = new Cajas;
        $cajas = Cajas::all();
        $empleado = Empleado::all();
        $cajaso = Cajas::orderBy('id_caja', 'desc')->get();
        $cajaAbierta = $cajaso->where('estado_caja', true);
        $mesActual = date('n');

        $mes = $request->input('mes', $mesActual); // Si no se proporciona, toma el mes actual
    
    // Lógica para obtener las transacciones del mes
    $transacciones = Cajas::whereMonth('created_at', '=', $mes)->with('empleados')->get();
    
    // Calcular el monto final del mes
    $montoFinal = $transacciones->sum('monto_final');

    // Otras lógicas para cargar datos necesarios en la vista index

    return view('panel.Cajas.index', compact('cajas', 'empleado', 'cajaAbierta', 'mesActual', 'mes', 'montoFinal', 'transacciones'));
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
        // $cajas->id_emp = auth()->user()->id; sirve pero por las conexiones debe estar el id en empleados
        $cajas->id_emp = $request->get('id_emp');
        $cajas->total_ventas_caja = $request->get('total_ventas_caja');
        $cajas->estado_caja = $request->get('estado_caja');
        $cajas->monto_final = $request->get('monto_final');
        //$producto->vendedor_id = auth()->user()->id;
        $cajas ->save();
        //Redir
        
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