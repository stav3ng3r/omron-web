<table class="table table-responsive" id="users-table">
    <thead>
    <tr>
        <th>Usuario</th>
        <th>Rol</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Reiniciar Contraseña</th>
        <th>Bloqueado</th>
        <th>Fecha Bloqueo</th>
        <th>Fecha Creado</th>
        <th>ID Persona</th>
        <th colspan="3">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ ($user->role ? $user->role->title : '') }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                    <span class="label label-{{ ($user->reset_password ? 'success' : 'default') }}">
                        {{ ($user->reset_password ? 'SI' : 'NO') }}
                    </span>

            </td>
            <td>
                    <span class="label label-{{ ($user->blocked ? 'success' : 'default') }}">
                        {{ ($user->blocked ? 'SI' : 'NO') }}
                    </span>

            </td>
            <td>{{ $user->blocked_at }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->id_people }}</td>
            <td>
                <div class='btn-group'>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete', 'id' => 'delete_form_' . $user->id]) !!}
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs block-on-click'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs block-on-click'><i
                                class="glyphicon glyphicon-edit"></i></a>

                    <a href="#" class="btn btn-danger btn-xs block-on-click"
                       onclick="swal_delete('Eliminar Usuario',
                               'Esta accion eliminara el usuario ' + '{{ $user->name }}. Desea continuar?', 'delete_form_{{ $user->id }}')"
                    >
                        <i class="glyphicon glyphicon-trash"></i></a>

                    {!! Form::close() !!}
                </div>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>