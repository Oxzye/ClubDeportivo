<?php

namespace App\Exports;

use App\Models\Socio;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

// class SociosBajaExportExcel implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Socio::all();
//     }
// }
class SociosBajaExportExcel implements FromView 
{
    public function view(): View {
        return view('panel.socios.excel_socios_baja', ['socios'=>Socio::all()->where('updated_at')]);
    }
}