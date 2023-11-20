<?php

namespace App\Exports;

use App\Models\SociosxActividad;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class SocxActExportExcel implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return SociosxActividad::all();
//     }
// }

class SocxActExportExcel implements FromView 
{
    public function view(): View {
        return view('panel.SocxAct.excel_socxact', ['socxact'=>SociosxActividad::all()]);
    }
}