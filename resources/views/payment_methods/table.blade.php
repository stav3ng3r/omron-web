<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Descripcion</th>
            <th>Dias</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($paymentMethods as $paymentMethod)
            <tr>
                <td>{{ $paymentMethod->descripcion }}</td>
                <td>{{ $paymentMethod->dias }}</td>
                <td>
                    {!! Form::open(['route' => ['paymentMethods.destroy', $paymentMethod->id], 'method' => 'delete', 'id' => "delete_form_$paymentMethod->id"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('paymentMethods.show', [$paymentMethod->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('paymentMethods.edit', [$paymentMethod->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs block-on-click"
                           onclick="swal_delete('Eliminar Forma de Pago',
                                   'Esta accion eliminara la Forma de Pago' + '{{ $paymentMethod->descripcion }}. Desea continuar?', 'delete_form_{{ $paymentMethod->id }}')"
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