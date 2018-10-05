<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Codigo Producto Principal</th>
        <th>Codigo Producto Accesorio</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productAccessories as $productAccessory)
            <tr>
                <td>{{ $productAccessory->codigo_producto_principal }}</td>
            <td>{{ $productAccessory->codigo_producto_accesorio }}</td>
                <td>
                    {!! Form::open(['route' => ['productAccessories.destroy', $productAccessory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('productAccessories.show', [$productAccessory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('productAccessories.edit', [$productAccessory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                                               onclick="swal_delete('Eliminar Product Accessory',
                                                       'Esta accion eliminara el Product Accessory ' + '{{ $productAccessory->name }}. Desea continuar?', 'delete_form_{{ $productAccessory->id }}')"
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