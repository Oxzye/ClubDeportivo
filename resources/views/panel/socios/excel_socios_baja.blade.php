<table>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" class="text-uppercase">DNI</th>
            <th scope="col" class="text-uppercase">Socio</th>
            <th scope="col" class="text-uppercase">Email</th>
            <th scope="col" class="text-uppercase">Localidad</th>
            <th scope="col" class="text-uppercase">Genero</th>
            <th scope="col" class="text-uppercase">Fecha de baja</th>
            <th scope="col" class="text-uppercase">Domicilio</th>
            <th scope="col" class="text-uppercase">Telefono</th>
            <th scope="col" class="text-uppercase">Observaciones</th>
            {{-- <th scope="col" class="text-uppercase">Foto</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($socios as $socio)
            <tr class="">
                <td>{{ $socio->id_soc }}</td>
                <td>{{ $socio->user->dni }}</td>
                <td><b>{{ $socio->user->name }}</b>{{ ' ' . $socio->user->apellido }}</td>
                <td>{{ $socio->user->email }}</td>
                <td>{{ $socio->user->id_loc }}</td>
                <td>{{ $socio->user->genero->abreviatura_genero }}</td>
                <td><b>{{ $socio->deleted_at }}</b></td>
                <td>{{ $socio->user->domicilio }}</td>
                <td>{{ $socio->user->telefono }}</td>
                <td>{{ Str::limit($socio->observaciones_soc, 80) }}</td>
                {{-- <td>
                    <img src="{{ $socio->user->imagen }}" alt="imagen_socio" class="img-fluid"
                        style="width: 100px;">
                </td> --}}
            </tr>
        @endforeach
    </tbody>
</table>
