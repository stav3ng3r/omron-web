<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Descripcion</th>
        <th>Numero Documento</th>
        <th>Direccion</th>
        <th>Email</th>
        <th>Logo</th>
        <th>Distribuidor</th>
        <th>Fecha Creacion</th>
        <th>Fecha Actualizacion</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->descripcion }}</td>
            <td>{{ $client->numero_documento }}</td>
            <td>{{ $client->direccion }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->logo }}</td>
            <td>{{ $client->distribuidor }}</td>
            <td>{{ $client->fecha_creacion }}</td>
            <td>{{ $client->fecha_actualizacion }}</td>
                <td>
                    {!! Form::open(['route' => ['clients.destroy', $client->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('clients.show', [$client->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('clients.edit', [$client->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                                               onclick="swal_delete('Eliminar Client',
                                                       'Esta accion eliminara el Client ' + '{{ $client->name }}. Desea continuar?', 'delete_form_{{ $client->id }}')"
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