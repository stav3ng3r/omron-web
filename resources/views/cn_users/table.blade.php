<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Id Persona</th>
        <th>Id Role</th>
        <th>Id Tipo Usuario</th>
        <th>Password</th>
        <th>Usuario</th>
        <th>Bloqueado</th>
        <th>Resetear Password</th>
        <th>Fecha Ultimo Login</th>
        <th>Fecha Creacion</th>
        <th>Fecha Actualizacion</th>
        <th>Fecha Borrado</th>
        <th>Email</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cnUsers as $cnUser)
            <tr>
                <td>{{ $cnUser->id_persona }}</td>
            <td>{{ $cnUser->id_role }}</td>
            <td>{{ $cnUser->id_tipo_usuario }}</td>
            <td>{{ $cnUser->password }}</td>
            <td>{{ $cnUser->usuario }}</td>
            <td>{{ $cnUser->bloqueado }}</td>
            <td>{{ $cnUser->resetear_password }}</td>
            <td>{{ $cnUser->fecha_ultimo_login }}</td>
            <td>{{ $cnUser->fecha_creacion }}</td>
            <td>{{ $cnUser->fecha_actualizacion }}</td>
            <td>{{ $cnUser->fecha_borrado }}</td>
            <td>{{ $cnUser->email }}</td>
                <td>
                    {!! Form::open(['route' => ['cnUsers.destroy', $cnUser->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('cnUsers.show', [$cnUser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('cnUsers.edit', [$cnUser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                                               onclick="swal_delete('Eliminar Cn User',
                                                       'Esta accion eliminara el Cn User ' + '{{ $cnUser->name }}. Desea continuar?', 'delete_form_{{ $cnUser->id }}')"
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