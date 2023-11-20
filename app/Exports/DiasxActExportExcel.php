<?php

namespace App\Exports;

use App\Models\DiasxAct;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class DiasxActExportExcel implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return DiasxAct::all();
//     }
// }

class DiasxActExportExcel implements FromView 
{
    public function view(): View {
        return view('panel.DiasxAct.excel_diasxact', ['diasxact'=>DiasxAct::all()]);
    }
}