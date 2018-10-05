<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Descripcion</th>
        <th>Codigo</th>
        <th>Codigo Barra</th>
        <th>Activo</th>
        <th>Id Producto Tipo</th>
        <th>Id Producto Marca</th>
        <th>Id Producto Categoria</th>
        <th>Precio Venta</th>
        <th>Tiene Imagen</th>
        <th>Path Imagen</th>
        <th>Imagen</th>
        <th>Fecha Creacion</th>
        <th>Fecha Actualizacion</th>
        <th>Fecha Borrado</th>
        <th>Precio Costo</th>
        <th>Peso</th>
        <th>Precio Flete</th>
        <th>Precio Despacho</th>
        <th>Precio Costo Con Impuestos</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->nombre }}</td>
            <td>{{ $product->descripcion }}</td>
            <td>{{ $product->codigo }}</td>
            <td>{{ $product->codigo_barra }}</td>
            <td>{{ $product->activo }}</td>
            <td>{{ $product->id_producto_tipo }}</td>
            <td>{{ $product->id_producto_marca }}</td>
            <td>{{ $product->id_producto_categoria }}</td>
            <td>{{ $product->precio_venta }}</td>
            <td>{{ $product->tiene_imagen }}</td>
            <td>{{ $product->path_imagen }}</td>
            <td>{{ $product->imagen }}</td>
            <td>{{ $product->fecha_creacion }}</td>
            <td>{{ $product->fecha_actualizacion }}</td>
            <td>{{ $product->fecha_borrado }}</td>
            <td>{{ $product->precio_costo }}</td>
            <td>{{ $product->peso }}</td>
            <td>{{ $product->precio_flete }}</td>
            <td>{{ $product->precio_despacho }}</td>
            <td>{{ $product->precio_costo_con_impuestos }}</td>
                <td>
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                                               onclick="swal_delete('Eliminar Product',
                                                       'Esta accion eliminara el Product ' + '{{ $product->name }}. Desea continuar?', 'delete_form_{{ $product->id }}')"
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