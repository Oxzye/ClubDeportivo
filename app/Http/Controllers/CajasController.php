<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cajas;
use App\Models\Empleado;
class CajasController extends Controller
{
    public function index () {

        //$empleado = new Cajas;
        $cajas = Cajas::all();
        $empleado = Empleado::all();
        return view('panel.Cajas.index', compact('cajas', 'empleado'));
    }

    public function create () {
        $empleado = Empleado::all();
        $cajas = Cajas::all();
        return view('panel.Cajas.index', compact('cajas', 'empleado'));
 
    }

    public function store (Request $request) {
        //valid
        $cajas = new Cajas();
        //Guardado de los datos
        $cajas->monto_inicial_caja = $request->get('monto_inicial_caja');
        $cajas->total_ventas_caja = $request->get('total_ventas_caja');
        $cajas->saldo_caja = $request->get('saldo_caja');
        $cajas->id_emp = $request->get('id_emp');
       
        $cajas ->save();
        //Redir
        return redirect()->route('Cajas.index')->with('status', 'Cajas abierta correctamente');
    }

    public function edit($id_caja) {
        $cajas = Cajas::findOrFail($id_caja);

        if ($cajas) {
            $cajas = Cajas::all();
            return view('panel.Cajas.edit', compact('cajas', 'empleado'));
        } else {
            return redirect()->route('Cajas.index')->with('error', 'Cajas no encontrada');
        }
    }

    public function update(Request $request, $id){
        //$empleado = Paises::all();
        $cajas = Cajas::findOrFail($id);
        $cajas->monto_inicial_caja = $request->input('monto_inicial_caja');
        $cajas->total_ventas_caja = $request->input('total_ventas_caja');
        $cajas->saldo_caja = $request->input('saldo_caja');
        $cajas->id_emp = $request->input('id_emp');
        $cajas->save();
        
        
        //redireccion
        return redirect()->route('Cajas.index')->with('status', 'Cajas Actualizada correctamente');
    }

    public function destroy($id) {
        //busqueda
        $cajas = Cajas::findOrFail($id);

        //elminacion
        $cajas->delete();

        
        return redirect()->route('Cajas.index')->with('status', 'Cajas eliminada correctamente');
    }

    public function apertura(Request $request)
    {
        // Lógica para la apertura de caja aquí
        $cajas = new Cajas();
        //Guardado de los datos
        $cajas->monto_inicial_caja = $request->get('monto_inicial_caja');
        $cajas->total_ventas_caja = $request->get('total_ventas_caja');
        $cajas->saldo_caja = $request->get('saldo_caja');
        $cajas->id_emp = $request->get('id_emp');
       
        $cajas ->save();
        //Redir
        return redirect()->route('Cajas.apertura')->with('status', 'Cajas abierta correctamente');
        echo '<script>showCajaIndicator();</script>';
        echo '<script>viewFacturacion();</script>';
    }

    public function cierre()
    {
        // Lógica para el cierre de caja aquí
        echo '<script>hideCajaIndicator();</script>';
        echo '<script>hideFacturacion();</script>';

    }

}