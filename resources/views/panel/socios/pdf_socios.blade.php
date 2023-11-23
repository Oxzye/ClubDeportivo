<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte PDF</title>
    <link rel="stylesheet" href="{{ public_path('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <style>@page { size:55cm landscape }</style>
</head>
<body>
    {{-- <h3 class="text-center">Socios de {{ auth()->user()->name }}</h3> --}}
    <h3 class="text-center">Socios</h3>
    <table class="table table-striped w-100">
        <thead class="bg-primary text-center text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col" class="text-uppercase">DNI</th>
                <th scope="col" class="text-uppercase">Socio</th>
                <th scope="col" class="text-uppercase">Email</th>
                <th scope="col" class="text-uppercase">Localidad</th>
                <th scope="col" class="text-uppercase">Genero</th>
                <th scope="col" class="text-uppercase">Fecha de nac/edad</th>
                <th scope="col" class="text-uppercase">Domicilio</th>
                <th scope="col" class="text-uppercase">Telefono</th>
                <th scope="col" class="text-uppercase">Observaciones</th>
                <th scope="col" class="text-uppercase">Foto</th>
                <th scope="col" class="text-uppercase">Estado</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($socios as $socio)
                <tr class="">
                    <td>{{ $socio->id_soc }}</td>
                    <td>{{ $socio->user->dni }}</td>
                    <td><b>{{ $socio->user->name }}</b>{{ ' ' . $socio->user->apellido }}</td>
                    <td>{{ $socio->user->email }}</td>
                     <td>{{ $socio->user->id_loc }}</td>
                    <td>{{ $socio->user->genero->abreviatura_genero }}</td>
                    <td>{{ $socio->user->fecha_nac }}</td>
                    <td>{{ $socio->user->domicilio }}</td>
                    <td>{{ $socio->user->telefono }}</td>

                    <td>{{ Str::limit($socio->observaciones_soc, 80) }}</td>
                    <td>
                        <img src="{{ $socio->user->imagen }}" alt="imagen_socio" class="img-fluid"
                            style="width: 100px;">
                    </td>
                    <td>
                        <div class="d-none">{{ $socio->enabled }}</div>
                        {{ $socio->getStatusText() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>