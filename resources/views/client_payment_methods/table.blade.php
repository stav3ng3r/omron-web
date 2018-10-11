<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Distribuidor</th>
            <th>Cliente</th>
            <th>Forma De Pago</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientPaymentMethods as $clientPaymentMethod)
            <tr>
                <td>{{ $clientPaymentMethod->distributor->titulo }}</td>
                <td>{{ $clientPaymentMethod->client->descripcion }}</td>
                <td>{{ $clientPaymentMethod->forma_de_pago }}</td>
                <td>
                    {!! Form::open(['route' => ['clientPaymentMethods.destroy', $clientPaymentMethod->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('clientPaymentMethods.show', [$clientPaymentMethod->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('clientPaymentMethods.edit', [$clientPaymentMethod->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                           onclick="swal_delete('Eliminar Forma de Pago',
                                   'Esta accion eliminara el Client Payment Method' + '{{ $clientPaymentMethod->name }}. Desea continuar?', 'delete_form_{{ $clientPaymentMethod->id }}')"
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