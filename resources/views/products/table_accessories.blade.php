<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>Tipo</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productAccessories as $productAccessory)
            <tr>
                <td>{{ $productAccessory->nombre }}</td>
                <td>{{ $productAccessory->codigo }}</td>
                <td>{{ $productAccessory->product_type->descripcion }}</td>
                <td>{{ $productAccessory->brand->descripcion }}</td>
                <td>{{ $productAccessory->product_category->descripcion }}</td>
                <td style="max-width: 32px; max-height: 32px;">
                    <img src="{!! $productAccessory->image  !!}" class="img-responsive"
                         alt="{{ $productAccessory->nombre }}">
                </td>
                <td>
                    {!! Form::open(['url' =>  route('productAccessories.destroy', ['productAccessory' => $productAccessory->id, 'product' => $product->id]),
                        'method' => 'delete', 'id' => "delete_form_acc_{$productAccessory->id}"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('products.show', [$productAccessory->id]) !!}"
                           class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="#" class="btn btn-danger btn-xs"
                           onclick="swal_delete('Eliminar Accesorio',
                                   'Esta accion eliminara el Accesorio' + '{{ $productAccessory->nombre }}. Desea continuar?', 'delete_form_acc_{{ $productAccessory->id }}')"
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