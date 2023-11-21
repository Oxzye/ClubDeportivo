<table>
    <thead>
        <tr>
            <th>id_diasxact</th>
            <th>id_act</th>
            <th>id_dia</th>
            <th>horario_inicio</th>
            <th>horario_fin</th>
            <th>created_at</th>
            <th>updated_at</th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($diasxact as $dxact)
        <tr>
            <td>{{ $dxact->id_diasxact }}</td>
            <td>{{ $dxact->actividad->nombre_act }}</td>
            <td>{{ $dxact->dia->nombre_dia }}</td>
            <td>{{ $dxact->horario_inicio }}</td>
            <td>{{ $dxact->horario_fin }}</td>
            <td>{{ $dxact->created_at }}</td>
            <td>{{ $dxact->updated_at }}</td>
    </tr>
    @endforeach
</tbody>
</table>