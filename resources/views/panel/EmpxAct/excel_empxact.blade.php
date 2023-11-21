<table>
    <thead>
        <tr>
            <th>id_exa</th>
            <th>id_emp</th>
            <th>id_act</th>
            <th>created_at</th>
            <th>updated_at</th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($empxactiv as $empxact)
        <tr>
            <td>{{ $empxact->id_exa }}</td>
            <td>{{ $empxact->empleado->user->name .' '. $empxact->empleado->user->apellido }}</td>
            <td>{{ $empxact->actividad->nombre_act }}</td> 
            <td>{{ $empxact->created_at }}</td>
            <td>{{ $empxact->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>