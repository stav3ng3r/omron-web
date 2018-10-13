<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Descripcion</th>
            <th>Pais</th>
            <th>Ciudad</th>
            <th>Direccion Entrega</th>
            <th>Telefono Entrega</th>
            <th>Contacto Entrega</th>
            <th>Cliente</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientAddresses as $clientAddress)
            <tr>
                <td>{{ $clientAddress->descripcion }}</td>
                <td>{{ $clientAddress->country->descripcion }}</td>
                <td>{{ $clientAddress->city->descripcion }}</td>
                <td>{{ $clientAddress->direccion_entrega }}</td>
                <td>{{ $clientAddress->telefono_entrega }}</td>
                <td>{{ $clientAddress->contacto_entrega }}</td>
                <td>{{ $clientAddress->client->descripcion }}</td>
                <td>
                    {!! Form::open(['route' => ['clientAddresses.destroy', $clientAddress->id], 'method' => 'delete', 'id' => "delete_form_{$clientAddress->id}"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('clientAddresses.show', [$clientAddress->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('clientAddresses.edit', [$clientAddress->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs block-on-click"
                           onclick="swal_delete('Eliminar Direccion',
                                   'Esta accion eliminara la Direccion' + '{{ $clientAddress->name }}. Desea continuar?', 'delete_form_{{ $clientAddress->id }}')"
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