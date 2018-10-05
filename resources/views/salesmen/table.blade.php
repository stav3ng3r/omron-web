<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Id Persona</th>
        <th>Activo</th>
        <th>Porcentaje Comision</th>
        <th>Fecha Creacion</th>
        <th>Meta</th>
        <th>Fecha Actualizacion</th>
        <th>Fecha Borrado</th>
        <th>Email</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($salesmen as $salesman)
            <tr>
                <td>{{ $salesman->id_persona }}</td>
            <td>{{ $salesman->activo }}</td>
            <td>{{ $salesman->porcentaje_comision }}</td>
            <td>{{ $salesman->fecha_creacion }}</td>
            <td>{{ $salesman->meta }}</td>
            <td>{{ $salesman->fecha_actualizacion }}</td>
            <td>{{ $salesman->fecha_borrado }}</td>
            <td>{{ $salesman->email }}</td>
                <td>
                    {!! Form::open(['route' => ['salesmen.destroy', $salesman->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('salesmen.show', [$salesman->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('salesmen.edit', [$salesman->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                                               onclick="swal_delete('Eliminar Salesman',
                                                       'Esta accion eliminara el Salesman ' + '{{ $salesman->name }}. Desea continuar?', 'delete_form_{{ $salesman->id }}')"
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