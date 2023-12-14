@extends('adminlte::page')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('title', 'Actividades Particulares')

@section('content')
    <div class="container-fluid">
        <h1>Actividades Particulares</h1>
        @if (session('status'))
            <div class="col-12 alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('alert'))
            <div class="col-12 alert alert-danger">
                {{ session('alert') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="col-12">
            <div class="card h-100" style="min-height: 80vh;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-12 ">
                            <div class="card col-lg-12 col-12">
                                <div class="card-body mb-2 d-flex justify-content-center">
                                    <form action="" method="get" class="form-inline">
                                        <div class="form-group">

                                            <label for="dni" class="form-control">Ingrese el número de documento del
                                                socio </label>

                                            <select id="dni" name="dni" class="form-control select2">
                                                <option value="">Ingrese un DNI...</option>
                                                @foreach ($socio as $soc)
                                                    <option value="{{ $soc->user->dni }}">
                                                        {{ $soc->user->dni }}, {{ $soc->user->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <button type="submit" class="btn btn-primary form-control"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @if ($resultados->count() > 0)
                            <div class="col-12">
                                <x-adminlte-alert theme="info"
                                    title="Informacion del socio">
                                    Socio: {{ $resultados[0]->name . ' ' . $resultados[0]->apellido }} <br>
                                    DNI: {{ $resultados[0]->dni }} <br>
                                    Estado: @if ($resultados[0]->enabled == true)
                                        Socio Activo
                                    @else 
                                        Socio Inactivo
                                    @endif
                                </x-adminlte-alert>
                            </div>
                        @endif
                        @if ($info && count($info) > 0)
                            <div class="col-12">
                                <x-adminlte-alert theme="info"
                                    title="Informacion del socio">
                                    Socio: {{ $info[0]->name . ' ' . $info[0]->apellido }} <br>
                                    DNI: {{ $info[0]->dni }} <br>
                                    Este socio no esta inscripto en ninguna actividad dentro del club! 
                                </x-adminlte-alert>
                            </div>
                        @endif


                        @php
                            $i = 1;
                            //dd($actpagadas, $actividadesNoPagadas);
                            //dd($info);
                        @endphp

                        @if ($resultados->count() > 0)
                            <div class="card col-lg-12 col-12 text-center border border-5 border-success">
                                <div class="card-body ">
                                    <h3 class="card-title text-uppercase text-bold">Actividades pagadas</h3>
                                    <table id="tabla-insc_act_part" class="table table-striped table-hover w-100">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-uppercase">#</th>
                                                <th scope="col" class="text-uppercase">Inscripto en</th>
                                                <th scope="col" class="text-uppercase">Fecha de inscripcion</th>
                                                <th scope="col" class="text-uppercase">Fecha de pago</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($actpagadas as $resultado)
                                                <tr>
                                                    <th>{{ $i++ }}</th>
                                                    <td><b>{{ $resultado->nombreDep . ' | ' }}{{ $resultado->nombre_act }}</b>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($resultado->fecha_inscripcion)->format('d/M/Y') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($resultado->fecha_pago_fac)->format('d/M/Y') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                        @if ($actividadesNoPagadas->count() > 0)
                            <div class="card col-lg-12 col-12 text-center border border-5 border-warning">
                                <div class="card-body">
                                    <h3 class="card-title text-uppercase text-bold">Actividades sin pagar</h3>
                                    <table id="tabla-insc_act_part-2" class="table table-striped table-hover w-100">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-uppercase">#</th>
                                                <th scope="col" class="text-uppercase">Inscripto en</th>
                                                <th scope="col" class="text-uppercase">Fecha de inscripcion</th>
                                                <th scope="col" class="text-uppercase">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($actividadesNoPagadas as $resultado)
                                                <tr>
                                                    <th>{{ $i++ }}</th>
                                                    <td><b>{{ $resultado->nombreDep . ' | ' }}{{ $resultado->nombre_act }}</b>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($resultado->fecha_inscripcion)->format('d/M/Y') }}
                                                    </td>
                                                    <td>
                                                        @if ($info && count($info) > 0)
                                                            <a class="text-bold"
                                                                href="{{ route('insc_act_part.cobrar', $info[0]->dni) }}">Cobrar
                                                                Actividad <i class="fas fa-hand-holding-usd"></i></a>
                                                        @elseif ($resultados->count() > 0)
                                                            <a class="text-bold"
                                                                href="{{ route('insc_act_part.cobrar', $resultados[0]->dni) }}">Cobrar
                                                                Actividad <i class="fas fa-hand-holding-usd"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
{{-- Importacion de Archivos CSS --}}
@section('css')

@stop


{{-- Importacion de Archivos JS --}}
@section('js')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
    <script src="{{ asset('js/insc_act_part.js') }}"></script>
@stop
