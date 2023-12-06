<table>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" class="text-uppercase">DNI</th>
            <th scope="col" class="text-uppercase">Empleado</th>
            <th scope="col" class="text-uppercase">Cargo</th>
            <th scope="col" class="text-uppercase">Email</th>
            <th scope="col" class="text-uppercase">Localidad</th>
            <th scope="col" class="text-uppercase">Genero</th>
            <th scope="col" class="text-uppercase">Fecha de nac/edad</th>
            <th scope="col" class="text-uppercase">Domicilio</th>
            <th scope="col" class="text-uppercase">Telefono</th>
            {{-- <th scope="col" class="text-uppercase">Foto</th> --}}
            <th scope="col" class="text-uppercase">Opciones</th>
        </tr> 
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
            <tr class="">
                <td>{{ $empleado->id_emp }}</td>
                <td>{{ $empleado->user->dni }}</td>
                <td>{{ $empleado->user->name . ' ' . $empleado->user->apellido }}</td>
                <td>{{ $empleado->cargo->nombre_cargo }}</td>
                <td>{{ $empleado->user->email }}</td>
                <td>{{ $empleado->user->id_loc }}</td>
                <td>{{ $empleado->user->genero ? $empleado->user->genero->abreviatura_genero : '-no asignado-' }}</td>
                <td>{{ $empleado->user->fecha_nac }}</td>
                <td>{{ $empleado->user->domicilio }}</td>
                <td>{{ $empleado->user->telefono }}</td>
                {{-- <td>
                    <img src="" alt="imagen empleado" class="img-fluid"
                        style="width: 150px;">
                </td> --}}
            </tr>
        @endforeach
    </tbody>
</table>