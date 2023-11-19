<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte PDF</title>
    <link rel="stylesheet" href="{{ public_path('vendor/adminlte/dist/css/adminlte.min.css') }}">
</head>
<body>
    <h3 class="text-center">Actividades de {{ auth()->user()->name }}</h3>
    <table class="table table-striped w-100">
        <thead class="bg-primary text-center text-white">
            <tr>
                <th class="text-center">id_act</th>
                <th class="text-center">id_dep</th>
                <th class="text-center">id_inst</th>
                <th class="text-center">nombre_act</th>
                <th class="text-center">limite_soc_atc</th>
                <th class="text-center">descripcion_act</th>
                <th class="text-center">actividad_en_curso</th>
                <th class="text-center">fecha_inicio_act</th>
                <th class="text-center">fecha_fin_act</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($actividades as $act)
                <tr class="">
                    <td class="text-center">{{ $act->id_act }}</td>
                    <td class="text-center">{{ $act->deporte->nombreDep }}</td>
                    <td class="text-center">{{ $act->instalacion->nombre_inst }}</td>
                    <td class="text-center">{{ $act->nombre_act }}</td>
                    <td class="text-center">{{ $act->limite_soc_atc }}</td>
                    <td class="text-center">{{ $act->descripcion_act }}</td>
                    <td class="text-center">{{ $act->actividad_en_curso }}</td>
                    <td class="text-center">{{ $act->fecha_inicio_act }}</td>
                    <td class="text-center">{{ $act->fecha_fin_act }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>