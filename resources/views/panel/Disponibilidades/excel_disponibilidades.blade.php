<table>
    <thead>
        <tr>
            <th>id_disp</th>
            <th>id_inst</th>
            <th>id_dia</th>
            <th>horariodisp</th>            
            <th>created_at</th>
            <th>updated_at</th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($disponibilidades as $disp)
            <tr>
                <td>{{ $disp->id_disp }}</td>
                <td>{{ $disp->instalacion->nombre_inst }}</td>
                <td>{{ $disp->dia->nombre_dia }}</td>
                <td>{{ $disp->horariodisp }}</td>
                <td>{{ $disp->created_at }}</td>
                <td>{{ $disp->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>