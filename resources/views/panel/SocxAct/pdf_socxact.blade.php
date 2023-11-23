<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte PDF</title>
    <link rel="stylesheet" href="{{ public_path('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <style>@page { size:35cm landscape }</style>
</head>
<body>
    {{-- <h3 class="text-center">Socios por Actividad de {{ auth()->user()->name }}</h3> --}}
    <h3 class="text-center">Socios por Actividad</h3>
    <table class="table table-striped w-100">
        <thead class="bg-primary text-center text-white">
            <tr>
                <th>id_sxa</th>
                <th>id_act</th>
                <th>socio</th>
                <th>fecha_inscripcion</th>
                <th>opinion_soc</th>
                <th>created_at</th>
                <th>updated_at</th> 
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($socxact as $sxa)
                <tr class="">
                    <td>{{ $sxa->id_sxa }}</td>
                    <td>{{ $sxa->actividad->nombre_act }}</td>
                    <td>{{ $sxa->socio->user->name .' '. $sxa->socio->user->apellido }}</td>
                    <td>{{ $sxa->fecha_inscripcion }}</td>
                    <td>{{ $sxa->opinion_soc }}</td>
                    <td>{{ $sxa->created_at }}</td>
                    <td>{{ $sxa->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>