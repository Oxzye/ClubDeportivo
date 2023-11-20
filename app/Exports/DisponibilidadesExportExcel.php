<?php

namespace App\Exports;

use App\Models\Disponibilidades;
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

class DisponibilidadesExportExcel implements FromView 
{
    public function view(): View {
        return view('panel.Disponibilidades.excel_disponibilidades', ['disponibilidades'=>Disponibilidades::all()]);
    }
}
