<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Cliente</th>
            <th>Nombre</th>
            <th>Departamento</th>
            <th>Email</th>
            <th>Telefono Contacto</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientContacts as $clientContact)
            <tr>
                <td>{{ $clientContact->client->descripcion }}</td>
                <td>{{ $clientContact->nombre }}</td>
                <td>{{ $clientContact->departamento }}</td>
                <td>{{ $clientContact->email }}</td>
                <td>{{ $clientContact->telefono_contacto }}</td>
                <td>
                    {!! Form::open(['route' => ['clientContacts.destroy', $clientContact->id], 'method' => 'delete', 'id' => "delete_form_{$clientContact->id}"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('clientContacts.show', [$clientContact->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('clientContacts.edit', [$clientContact->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                           onclick="swal_delete('Eliminar Contacto',
                                   'Esta accion eliminara el Contacto de ' + '{{ $clientContact->client->descripcion }}. Desea continuar?', 'delete_form_{{ $clientContact->id }}')"
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