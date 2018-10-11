<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Usuario</th>
            <th>Persona</th>
            <th>Role</th>
            <th>Tipo Usuario</th>
            <th>Password</th>
            <th>Bloqueado</th>
            <th>Resetear Password</th>
            <th>Fecha Ultimo Login</th>
            <th>Fecha Creacion</th>
            <th>Fecha Actualizacion</th>
            <th>Email</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($usersApps as $usersApp)
            <tr>
                <td>{{ $usersApp->usuario }}</td>
                <td>{{ $usersApp->person->full_name }}</td>
                <td>{{ $usersApp->role->descripcion }}</td>
                <td>{{ $usersApp->user_type->descripcion }}</td>
                <td>{{ $usersApp->password }}</td>
                <td>{{ $usersApp->email }}</td>
                <td>{{ $usersApp->bloqueado }}</td>
                <td>{{ $usersApp->resetear_password }}</td>
                <td>{{ $usersApp->fecha_ultimo_login }}</td>
                <td>{{ $usersApp->fecha_creacion }}</td>
                <td>{{ $usersApp->fecha_actualizacion }}</td>
                <td>
                    {!! Form::open(['route' => ['usersApps.destroy', $usersApp->id], 'method' => 'delete', 'id' => "delete_form_$usersApp->id"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('usersApps.show', [$usersApp->id]) !!}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('usersApps.edit', [$usersApp->id]) !!}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                           onclick="swal_delete('Eliminar Usuarios App',
                                   'Esta accion eliminara el Usuario App ' + '{{ $usersApp->usuario }}. Desea continuar?', 'delete_form_{{ $usersApp->id }}')"
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