<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Descripcion</th>
        <th>Fecha Creacion</th>
        <th>Fecha Actualizacion</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userTypes as $userType)
            <tr>
                <td>{{ $userType->descripcion }}</td>
            <td>{{ $userType->fecha_creacion }}</td>
            <td>{{ $userType->fecha_actualizacion }}</td>
                <td>
                    {!! Form::open(['route' => ['userTypes.destroy', $userType->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('userTypes.show', [$userType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('userTypes.edit', [$userType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                                               onclick="swal_delete('Eliminar User Type',
                                                       'Esta accion eliminara el User Type ' + '{{ $userType->name }}. Desea continuar?', 'delete_form_{{ $userType->id }}')"
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