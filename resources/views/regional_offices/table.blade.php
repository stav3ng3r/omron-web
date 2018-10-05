<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Pais</th>
            <th>Ciudad</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Centro Distribucion</th>
            <th>Marca</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($regionalOffices as $regionalOffice)
            <tr>
                <td>{{ $regionalOffice->titulo }}</td>
                <td>{{ $regionalOffice->descripcion }}</td>
                <td>{{ $regionalOffice->country->descripcion }}</td>
                <td>{{ $regionalOffice->city->descripcion }}</td>
                <td>{{ $regionalOffice->direccion }}</td>
                <td>{{ $regionalOffice->telefono }}</td>
                <td>{{ $regionalOffice->distribution_center->titulo }}</td>
                <td>{{ $regionalOffice->brand->descripcion }}</td>
                <td>
                    {!! Form::open(['route' => ['regionalOffices.destroy', $regionalOffice->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('regionalOffices.show', [$regionalOffice->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('regionalOffices.edit', [$regionalOffice->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                           onclick="swal_delete('Eliminar Oficina Regional',
                                   'Esta accion eliminara la Oficina Regional ' + '{{ $regionalOffice->titulo }}. Desea continuar?', 'delete_form_{{ $regionalOffice->id }}')"
                        >
                            <i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>