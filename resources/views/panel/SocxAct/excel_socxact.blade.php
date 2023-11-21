<table>
    <thead>
        <tr>
            <th>id_sxa</th>
            <th>id_act</th>
            <th>socio</th>
            <th>fecha_inscripcion</th>
            <th>opinion_soc</th>
            <th>created_at</th>
            <th>updated_at</th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($socxact as $sxa)
        <tr class="">
            <td>{{ $sxa->id_sxa }}</td>
            <td>{{ $sxa->actividad->nombre_act }}</td>
            <td>{{ $sxa->socio->user->name .' '. $sxa->socio->user->apellido }}</td>
            <td>{{ $sxa->fecha_inscripcion }}</td>
            <td>{{ $sxa->opinion_soc }}</td>
            <td>{{ $sxa->created_at }}</td>
            <td>{{ $sxa->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>