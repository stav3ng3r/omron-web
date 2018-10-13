<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Numero Contactos</th>
            <th>Voltaje Maximo</th>
            <th>Voltaje Minimo</th>
            <th>Corriente Minima</th>
            <th>Corriente Maxima</th>
            <th>Cantidad Entradas</th>
            <th>Cantidad Salidas</th>
            <th>Tipo Terminal</th>
            <th>Capacidad Memoria</th>
            <th>Extra1</th>
            <th>Extra2</th>
            <th>Extra3</th>
            <th>Codigo</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productDetails as $productDetail)
            <tr>
                <td>{{ $productDetail->numero_contactos }}</td>
                <td>{{ $productDetail->voltaje_maximo }}</td>
                <td>{{ $productDetail->voltaje_minimo }}</td>
                <td>{{ $productDetail->corriente_minima }}</td>
                <td>{{ $productDetail->corriente_maxima }}</td>
                <td>{{ $productDetail->cantidad_entradas }}</td>
                <td>{{ $productDetail->cantidad_salidas }}</td>
                <td>{{ $productDetail->tipo_terminal }}</td>
                <td>{{ $productDetail->capacidad_memoria }}</td>
                <td>{{ $productDetail->extra1 }}</td>
                <td>{{ $productDetail->extra2 }}</td>
                <td>{{ $productDetail->extra3 }}</td>
                <td>{{ $productDetail->codigo }}</td>
                <td>
                    {!! Form::open(['url' => route('productDetails.destroy', ['productDetail' => $productDetail->id, 'product' => $product->id]),
                        'method' => 'delete', 'id' => "delete_form_det_{$productDetail->id}"]) !!}
                    <div class='btn-group'>
                        {{--<a href="{!! route('productDetails.show', ['productDetail' => $productDetail->id, 'product' => $product->id]) !!}"--}}
                        {{--class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                        <a href="{!! route('productDetails.edit', ['productDetail' => $productDetail->id, 'product' => $product->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                           onclick="swal_delete('Eliminar Detalle',
                                   'Esta accion eliminara el Detalle ' + '{{ $productDetail->name }}. Desea continuar?', 'delete_form_det_{{ $productDetail->id }}')"
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