@extends('adminlte::page')

@section('plugins.Datatables', true)

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('title', 'Index de cuotas sociales')

@section('content')
    <div class="container-fluid">
        <h1>Cuotas Sociales</h1>
        @if ($resultados->count() > 0)
            <div class="col-12">
                <x-adminlte-alert theme="info" title="Socio: {{ $resultados[0]->name . ' ' . $resultados[0]->apellido }}">
                </x-adminlte-alert>
            </div>
        @endif
        @if ($info && count($info) > 0)
            <div class="col-12">
                <x-adminlte-alert theme="info" title="Socio: {{ $info[0]->name . ' ' . $info[0]->apellido }}">
                </x-adminlte-alert>
            </div>
        @endif
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

                        @php
                            $i = 1;
                        @endphp

                        @if ($resultados->count() > 0)
                            <div class="card col-lg-6 col-12 ">
                                <div class="card-body ">
                                    <table id="tabla-cuotas" class="table table-bordered table-hover w-100">
                                        <caption>Tabla de cuotas pagadas.</caption>
                                        <thead class="table-success">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" class="text-uppercase">Coutas Pagadas</th>
                                                <th scope="col" class="text-uppercase">Fecha de Pago</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($resultados as $indice => $resultado)
                                                <tr>
                                                    <th>{{ $i++ }}</th>
                                                    <td><b>{{ ' ' . $resultado->descripcion_tdf }}</b></td>
                                                    <td>{{ \Carbon\Carbon::parse($resultado->fecha_pago_fac)->format('d/M/Y') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                        @if ($info2 && count($info2) > 0)
                            <div class="card col-lg-6 col-12">
                                <div class="card-body ">
                                    <table id="tabla-cuotas-2" class="table table-bordered table-hover w-100">
                                        <caption>Tabla de cuotas sin pagar.</caption>
                                        <thead class="table-warning">
                                            <tr>
                                                <th scope="col" class="text-uppercase">#</th>
                                                <th scope="col" class="text-uppercase">Coutas Sin pagar</th>
                                                <th scope="col" class="text-uppercase">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($info2 as $indice => $infor)
                                                <tr>
                                                    <th>{{ $i++ }}</th>
                                                    <td><b>{{ ' ' . $infor->descripcion_tdf }}</b></td>
                                                    <td class="">
                                                        @if ($info && count($info) > 0)
                                                            <a class="text-bold"
                                                                href="{{ route('cuota_social.cobrar', $info[0]->dni) }}">Cobrar
                                                                Cuota <i class="fas fa-hand-holding-usd"></i></a>
                                                        @elseif ($resultados->count() > 0)
                                                            <a class="text-bold"
                                                                href="{{ route('cuota_social.cobrar', $resultados[0]->dni) }}">Cobrar
                                                                Cuota <i class="fas fa-hand-holding-usd"></i></a>
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

    {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('js/cuotas.js') }}"></script>
@stop
