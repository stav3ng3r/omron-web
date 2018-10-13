<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Titulo</th>
            {{--<th>Level</th>--}}
            {{--<th>Scope</th>--}}
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>{{ $role->title }}</td>
                {{--<td>{{ $role->level }}</td>--}}
                {{--<td>{{ $role->scope }}</td>--}}
                <td>
                    {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete', 'id' => "delete_form_$role->id"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('roles.show', [$role->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('roles.edit', [$role->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs block-on-click"
                           onclick="swal_delete('Eliminar Rol',
                                   'Esta accion eliminara el Rol ' + '{{ $role->name }}. Desea continuar?', 'delete_form_{{ $role->id }}')"
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