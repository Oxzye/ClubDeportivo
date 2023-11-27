<table>
    <thead>
        <tr>
            <th>id_act</th>
            <th>id_dep</th>
            <th>id_inst</th>
            <th>nombre_act</th>
            <th>limite_soc_atc</th>
            <th>descripcion_act</th>
            <th>precio_act</th>
            <th>actividad_en_curso</th>
            <th>fecha_inicio_act</th>
            <th>fecha_fin_act</th>  
            <th>created_at</th>           
            <th>updated_at</th>           
            <th>deleted_at</th>                     
        </tr>
    </thead>
    <tbody>
        @foreach ($actividades as $act)
            <tr class="">
                <td>{{ $act->id_act }}</td>
                <td>{{ $act->deporte->nombreDep }}</td>
                <td>{{ $act->instalacion->nombre_inst }}</td>
                <td>{{ $act->nombre_act }}</td>
                <td>{{ $act->limite_soc_atc }}</td>
                <td>{{ $act->descripcion_act }}</td>
                <td>{{ $act->precio_act }}</td>
                <td>{{ $act->actividad_en_curso }}</td>
                <td>{{ $act->fecha_inicio_act }}</td>
                <td>{{ $act->fecha_fin_act }}</td>

                <td>{{ $act->created_at }}</td>
                <td>{{ $act->updated_at }}</td>
                <td>{{ $act->deleted_at }}</td>
            </tr>     
        @endforeach