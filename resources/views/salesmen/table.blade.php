<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Persona</th>
            <th>Activo</th>
            <th>Porcentaje Comision</th>
            <th>Meta</th>
            <th>Email</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($salesmen as $salesman)
            <tr>
                <td>{{ $salesman->person->full_name }}</td>
                <td>
                    <span class="label label-{{ ($salesman->activo ? 'success' : 'default') }}">
                        {{ ($salesman->activo ? 'SI' : 'NO') }}
                    </span>

                </td>
                <td>{{ $salesman->porcentaje_comision }}</td>
                <td>{{ $salesman->meta }}</td>
                <td>{{ $salesman->email }}</td>
                <td>
                    {!! Form::open(['route' => ['salesmen.destroy', $salesman->id], 'method' => 'delete', 'id' => "delete_form_{$salesman->id}"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('salesmen.show', [$salesman->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('salesmen.edit', [$salesman->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs block-on-click"
                           onclick="swal_delete('Eliminar Vendedor',
                                   'Esta accion eliminara el Vendedor ' + '{{ $salesman->person->full_name }}. Desea continuar?', 'delete_form_{{ $salesman->id }}')"
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