<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>Activo</th>
            <th>Tipo</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Imagen</th>
            <th>Precio Venta</th>
            <th>Precio Costo</th>
            <th>Precio Flete</th>
            <th>Precio Despacho</th>
            <th>Precio Costo Con Impuestos</th>
            <th>Peso</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->nombre }}</td>
                <td>{{ $product->codigo }}</td>
                <td>{{ $product->activo }}</td>
                <td>{{ $product->product_type->descripcion }}</td>
                <td>{{ $product->brand->descripcion }}</td>
                <td>{{ $product->product_category->descripcion }}</td>
                <td style="max-width: 32px; max-height: 32px;">
                    <img src="{!! $product->image  !!}" class="img-responsive" alt="{{ $product->nombre }}">
                </td>
                <td>{{ number_format($product->precio_venta, 2) }}</td>
                <td>{{ number_format($product->precio_costo, 2) }}</td>
                <td>{{ number_format($product->precio_flete, 2) }}</td>
                <td>{{ number_format($product->precio_despacho, 2) }}</td>
                <td>{{ number_format($product->precio_costo_con_impuestos, 2) }}</td>
                <td>{{ $product->peso }}</td>
                <td>
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete', 'id' => "delete_form_{$product->id}"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs block-on-click"
                           onclick="swal_delete('Eliminar Producto',
                                   'Esta accion eliminara el Producto' + '{{ $product->nombre }}. Desea continuar?', 'delete_form_{{ $product->id }}')"
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