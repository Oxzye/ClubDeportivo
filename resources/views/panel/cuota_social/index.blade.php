@extends('adminlte::page')


@section('title', 'Index de cuotas sociales')

@section('content')
    <div class="container-fluid">
        <h1>Cuotas Sociales</h1>
        @if ($resultados->count())
            <div class="col-12">
                <x-adminlte-alert theme="info" title="Socio: {{ $resultados[0]->name . ' ' . $resultados[0]->apellido }}">
                    <div class="col-lg-3 col-12 mb-2">
                        <a class="btn btn-success" href="{{ route('cuota_social.cobrar', $info) }}">Cobrar Cuota</a>
                    </div>
                </x-adminlte-alert>
            </div>
        @endif
        @if (session('status'))
            <div class="col-12 alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-12 mb-2">
                            <form action="" method="get" class="form-inline">
                                <div class="form-group">
                                    <label for="dni" class="sr-only">DNI</label>
                                    <input type="number" class="form-control" id="dni" name="dni"
                                        placeholder="Ingrese DNI">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>


                    @if ($resultados->count())
                        <table id="tabla-cuotas" class="table table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th scope="col">DNI</th>
                                    <th scope="col" class="text-uppercase">Socio</th>
                                    <th scope="col" class="text-uppercase bg-success">Coutas Pagadas</th>
                                    <th scope="col" class="text-uppercase">Fecha de Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resultados as $resultado)
                                    <tr>
                                        <td>{{ $resultado->dni }}</td>
                                        <td><b>{{ $resultado->name }}</b>{{ ' ' . $resultado->apellido }}</td>
                                        <td><b>{{ ' ' . $resultado->descripcion_tdf }}</b>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($resultado->fecha_pago_fac)->format('d/M/Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        @endif

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
