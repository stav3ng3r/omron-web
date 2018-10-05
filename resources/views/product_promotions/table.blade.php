<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Id Producto</th>
        <th>Desde</th>
        <th>Hasta</th>
        <th>Fecha Creacion</th>
        <th>Distribuidor</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productPromotions as $productPromotion)
            <tr>
                <td>{{ $productPromotion->id_producto }}</td>
            <td>{{ $productPromotion->desde }}</td>
            <td>{{ $productPromotion->hasta }}</td>
            <td>{{ $productPromotion->fecha_creacion }}</td>
            <td>{{ $productPromotion->distribuidor }}</td>
                <td>
                    {!! Form::open(['route' => ['productPromotions.destroy', $productPromotion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('productPromotions.show', [$productPromotion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('productPromotions.edit', [$productPromotion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                                               onclick="swal_delete('Eliminar Product Promotion',
                                                       'Esta accion eliminara el Product Promotion ' + '{{ $productPromotion->name }}. Desea continuar?', 'delete_form_{{ $productPromotion->id }}')"
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