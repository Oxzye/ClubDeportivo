@extends('adminlte::page')


@section('title', 'Actividades Particulares')

@section('content')
    <div class="container-fluid">
        <h1>Actividades Particulares</h1>
        @if ($resultados->count() > 0)
            <div class="col-12">
                <x-adminlte-alert theme="info" title="Socio: {{ $resultados[0]->name . ' ' . $resultados[0]->apellido }}">
                    <div class="col-lg-3 col-12 mb-2">
                        <a class="btn btn-success" href="{{ route('insc_act_part.cobrar', $resultados[0]->dni) }}">Cobrar insc act part</a>
                    </div>
                </x-adminlte-alert>
            </div>
        @endif
        @if ($info && count($info) > 0)
            <div class="col-12">
                <x-adminlte-alert theme="info" title="Socio: {{ $info[0]->name . ' ' . $info[0]->apellido }}">
                    <div class="col-lg-3 col-12 mb-2">
                        <a class="btn btn-success" href="{{ route('insc_act_part.cobrar', $info[0]->dni) }}">Cobrar insc act part</a>
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
                        <table id="tabla-insc_act_part" class="table table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th scope="col">DNI</th>
                                    <th scope="col" class="text-uppercase">Socio</th>
                                    <th scope="col" class="text-uppercase bg-success">Inscripto en</th>
                                    <th scope="col" class="text-uppercase">Fecha de Inscripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resultados as $resultado)
                                    <tr>
                                        <td>{{ $resultado->dni }}</td>
                                        <td><b>{{ $resultado->name }}</b>{{ ' ' . $resultado->apellido }}</td>
                                        <td><b>{{ $resultado->nombre_act }}{{ ' ' . $resultado->descripcion_act }}</b>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($resultado->fecha_inscripcion)->format('d/M/Y') }}</td>
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
    <script src="{{ asset('js/insc_act_part.js') }}"></script>
@stop
