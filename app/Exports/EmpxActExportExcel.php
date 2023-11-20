<?php

namespace App\Exports;

use App\Models\EmpleadosxActividad;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class EmpxActExportExcel implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return EmpleadosxActividad::all();
//     }
// }
    class EmpxActExportExcel implements FromView 
    {
        public function view(): View {
            return view('panel.EmpxAct.excel_empxact', ['empxactiv'=>EmpleadosxActividad::all()]);
        }
    }