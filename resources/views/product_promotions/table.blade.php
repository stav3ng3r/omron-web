<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Producto</th>
            <th>Desde</th>
            <th>Hasta</th>
            <th>Distribuidor</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productPromotions as $productPromotion)
            <tr>
                <td>{{ $productPromotion->product->nombre }}</td>
                <td>{{ $productPromotion->desde }}</td>
                <td>{{ $productPromotion->hasta }}</td>
                <td>{{ ($productPromotion->distributor ? $productPromotion->distributor->titulo : '') }}</td>
                <td>
                    {!! Form::open(['route' => ['productPromotions.destroy', $productPromotion->id], 'method' => 'delete', 'id' => "delete_form_{$productPromotion->id}"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('productPromotions.show', [$productPromotion->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('productPromotions.edit', [$productPromotion->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs block-on-click"
                           onclick="swal_delete('Eliminar Promocion',
                                   'Esta accion eliminara la Promocion' + '{{ $productPromotion->name }}. Desea continuar?', 'delete_form_{{ $productPromotion->id }}')"
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