@extends('adminlte::page')


@section('title', 'Index de cuotas sociales')

@section('content')
    <div class="container-fluid">
        <h1>Cuotas Sociales</h1>
        @if ($resultados->count() > 0)
            <div class="col-12">
                <x-adminlte-alert theme="info" title="Socio: {{ $resultados[0]->name . ' ' . $resultados[0]->apellido }}">
                    <div class="col-lg-3 col-12 mb-2">
                        <a class="btn btn-success" href="{{ route('cuota_social.cobrar', $resultados[0]->dni) }}">Cobrar
                            Cuota</a>
                    </div>
                </x-adminlte-alert>
            </div>
        @endif
        @if ($info && count($info) > 0)
            <div class="col-12">
                <x-adminlte-alert theme="info" title="Socio: {{ $info[0]->name . ' ' . $info[0]->apellido }}">
                    <div class="col-lg-3 col-12 mb-2">
                        <a class="btn btn-success" href="{{ route('cuota_social.cobrar', $info[0]->dni) }}">Cobrar Cuota</a>
                    </div>
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
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-12 mb-2">
                            <form action="" method="get" class="form-inline">
                                <div class="form-group">
                                    <label for="dni" class="form-control">Ingrese el DNI del socio</label>
                                    <input type="number" class="form-control" id="dni" name="dni"
                                        placeholder="Ingrese DNI" maxlength="8">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>


                    @if ($resultados->count() > 0)
                        <table id="tabla-cuotas" class="table table-striped table-hover w-50">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-uppercase">Coutas Pagadas</th>
                                    <th scope="col" class="text-uppercase">Fecha de Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resultados as $indice => $resultado)
                                    <tr>
                                        <td>{{ $indice + 1 }}</td> {{-- Sumamos 1 porque los índices generalmente comienzan desde 0 --}}
                                        <td><b>{{ ' ' . $resultado->descripcion_tdf }}</b>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($resultado->fecha_pago_fac)->format('d/M/Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if ($info2 && count($info2) > 0)
                        <table id="tabla-cuotas" class="table table-striped table-hover w-50">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-uppercase">Coutas Sin pagar</th>
                                    <th scope="col" class="text-uppercase">Fecha de Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($info2 as $indice => $infor)
                                    <tr>
                                        <td>{{ $indice + 1 }}</td> {{-- Sumamos 1 porque los índices generalmente comienzan desde 0 --}}
                                        <td><b>{{ ' ' . $infor->descripcion_tdf }}</b>
                                        </td>
                                        <td>
                                            <p>Hola</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
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
    <script src="{{ asset('js/cuotas.js') }}"></script>
@stop
