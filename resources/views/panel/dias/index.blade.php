{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)
{{-- Agregar este link para ver los iconos de opciones --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
@section('title', 'Dias Index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-3">

                <a href="{{ route('dias.create') }}" class="btn btn-success text-uppercase">
                    Nuevo Dia
                </a>
            </div>

            @if (session('alert'))
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('alert') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="tabla-dias" class="table table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-uppercase">Nombre</th>
                                    <th class="d-flex flex-row-reverse bd-highlight px-5">Opciones &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dias as $dia)
                                    <tr>
                                        <td>{{ $dia->id_dia }}</td>
                                        <td>{{ $dia->nombre_dia }}</td>
                                        <td class="d-flex flex-row-reverse bd-highlight">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href=""
                                                    class="btn btn-outline-dark rounded-circle mx-2"
                                                    style="width:2.5em; height:2.5em;">
                                                    <span class="material-symbols-outlined d-flex justify-content-center">
                                                        info
                                                    </span>
                                                </a>
                                                <a href="{{ route('dias.edit', $dia) }}"
                                                    class="btn btn-outline-dark rounded-circle mx-2"
                                                    style="width:2.5em; height:2.5em;">
                                                    <span class="material-symbols-outlined d-flex justify-content-center">
                                                        edit_square
                                                    </span>
                                                </a>
                                                <form action="{{ route('dias.destroy', $dia) }}" method="post">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-dark rounded-circle mx-2"
                                                        style="width:2.5em; height:2.5em;">
                                                        <span
                                                            class="material-symbols-outlined d-flex justify-content-center">
                                                            cancel
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
        <script src="{{ asset('js/dias.js') }}"></script>
    @stop
