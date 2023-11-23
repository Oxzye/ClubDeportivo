<?php

namespace App\Exports;

use App\Models\Empleado;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class EmpleadosExportExcel implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Empleado::all();
//     }
// }

class EmpleadosExportExcel implements FromView 
{
    public function view(): View {
        return view('panel.empleados.excel_empleados', ['empleados'=>Empleado::all()]);
    }
}