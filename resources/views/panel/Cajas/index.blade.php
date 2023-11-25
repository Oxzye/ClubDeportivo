@extends('adminlte::page')


@section('title', 'Cajas Index')

@section('content')
<div class="container">
    <!--<div id="caja-indicator" class="alert alert-success" style="display: none;">
        La caja ha sido abierta.
      </div>-->
      
    <h1>Apertura y Cierre de Caja</h1>
    @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if ($cajaAbierta->isEmpty())
        <!-- No se han creado cajas, muestra el botón "Abrir caja" -->
        <a href="{{ route('Cajas.create') }}" class="btn btn-primary" id="abrircj">Abrir caja</a>
        <button id="cierrecj" class="btn btn-danger" style="display: none;">Cierre de caja</button>
    @else
        <!-- Se han creado cajas, oculta el botón "Abrir caja" -->
        <a href="{{ route('Cajas.create') }}" class="btn btn-primary" id="abrircj" style="display: none;">Abrir caja</a>
        <button id="cierrecj" class="btn btn-danger">Cierre de caja</button>
    @endif  
         <!-- <a href="{{ route('Cajas.create') }}" class="btn btn-primary" id="abrircj">Abrir caja</a>
            <button id="cierrecj" class="btn btn-danger">Cierre de caja</button>-->
        <div class="cierre_cajas" id="cierre_cajas" style="display: none">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title" >Cierre de Caja</h3>
                    </div>
                    <div class="box-body">
                        @foreach ($cajas as $caja)
                        @if (is_object($caja))
                            @if ($caja->estado_caja)
                        <form method="POST" action="{{ route('Cajas.update', $caja->id_caja) }}">
                            @csrf
                            @method('PATCH')
                            <input type="text" class="" name="monto_inicial_caja" id="" aria-describedby="helpId" value="{{ $caja->monto_inicial_caja }}" hidden>
                            
                            <div class="form-group">
                                <label for="Monto_final" >Monto final:</label>
                                <input type="number" name="monto_final" id="" class="form-control" value="{{ $caja->monto_final }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="total_ventas_caja">Total de ventas:</label>
                                <input type="number" name="total_ventas_caja" id="" class="form-control" value="{{ $caja->total_ventas_caja }}" readonly>
                            </div>
                            <input type="text" name="estado_caja" id="" class="form-control" placeholder="" aria-describedby="helpId" value="0" hidden>
                            <input type="text" class="" name="saldo_caja" id="" aria-describedby="helpId" value="{{ $caja->saldo_caja }}" hidden>
                            <input type="text" class="" name="id_emp" id="" aria-describedby="helpId" value="{{ $caja->id_emp }}" hidden>
                    
                            <button type="submit" class="btn btn-danger">Cerrar Caja</button>
                        </form>
                            @endif
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">


    document.getElementById('cierrecj').addEventListener('click', function() {
        var div = document.getElementById('cierre_cajas');

        if (div.style.display === 'none') {
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
            
        }
    });

    $(document).ready(function() {
        // Tu código JavaScript existente aquí

        // Verifica si hay cajas creadas
        if ($(".caja").length > 0) {
            // Se ha creado al menos una caja, oculta el botón de apertura
            $("#abrircj").hide();
        } else {
            // No se han creado cajas, oculta el botón de cierre
            $("#cierrecj").hide();
        }
    });
</script>

@endsection