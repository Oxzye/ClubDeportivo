@extends('adminlte::page')


@section('title', 'Cobro de cuotas sociales')

@section('content')
    <h3>Cobrar cuota/s del socio: {{ $socio->name . ' ' . $socio->apellido }}</h3>

    <input type="number" name="id_caja" value="{{ $cajasAbierta->id_caja }}" readonly>

    
@endsection