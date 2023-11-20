<?php

namespace App\Exports;

use App\Models\Actividad;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class ActividadesExportExcel implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Actividad::all();
//     }
// }

    class ActividadesExportExcel implements FromView 
    {
        public function view(): View {
            return view('panel.Actividades.excel_actividades', ['actividades'=>Actividad::all()]);
        }
    }