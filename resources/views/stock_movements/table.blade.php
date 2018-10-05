<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Id Producto</th>
        <th>Cantidad</th>
        <th>Id Comprobante</th>
        <th>Tipo Movimiento</th>
        <th>Fecha Creacion</th>
        <th>Fecha Actualizacion</th>
        <th>Distribuidor</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($stockMovements as $stockMovement)
            <tr>
                <td>{{ $stockMovement->id_producto }}</td>
            <td>{{ $stockMovement->cantidad }}</td>
            <td>{{ $stockMovement->id_comprobante }}</td>
            <td>{{ $stockMovement->tipo_movimiento }}</td>
            <td>{{ $stockMovement->fecha_creacion }}</td>
            <td>{{ $stockMovement->fecha_actualizacion }}</td>
            <td>{{ $stockMovement->distribuidor }}</td>
                <td>
                    {!! Form::open(['route' => ['stockMovements.destroy', $stockMovement->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('stockMovements.show', [$stockMovement->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('stockMovements.edit', [$stockMovement->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                                               onclick="swal_delete('Eliminar Stock Movement',
                                                       'Esta accion eliminara el Stock Movement ' + '{{ $stockMovement->name }}. Desea continuar?', 'delete_form_{{ $stockMovement->id }}')"
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