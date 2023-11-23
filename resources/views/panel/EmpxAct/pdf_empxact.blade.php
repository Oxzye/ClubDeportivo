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
                <th>id_exa</th>
                <th>id_emp</th>
                <th>id_act</th>
                <th>created_at</th>
                <th>updated_at</th> 
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($empxactiv as $empxact)
                <tr class="">
                    <td>{{ $empxact->id_exa }}</td>
                    <td>{{ $empxact->empleado->user->name .' '. $empxact->empleado->user->apellido }}</td>
                    <td>{{ $empxact->actividad->nombre_act }}</td> 
                    <td>{{ $empxact->created_at }}</td>
                    <td>{{ $empxact->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>